<?php


/*
  File name: Parse.php
  File description: realizes parses.
 */

require_once ('C:/xampp/htdocs/mds2013/exceptions/ENameSheetIncompatible.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/ESheetSerieIncompatible.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFailReadingSerieCategory .php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFailReadingSerieKind.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFailReadingSerieTime.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFailReadingSerieCrime.php');
require_once ('C:/xampp/htdocs/mds2013/libs/excel_reader2.php');

class Parse {

    private $kind;
    private $time;
    private $crime;
    private $category;
    private $dados;
    private $total;
    private $regiao;

    public function __construct($planilha) {

        $this->dados = new Spreadsheet_Excel_Reader("C:/xampp/htdocs/mds2013/files/" . $planilha, "UTF-8");
        if ($planilha == "s�rie hist�rica - 2001 - 2012 2.xls") {
            $this->historicalSeriesParse();
        } else if ($planilha == "JAN_SET_2011_12  POR REGIAO ADM_2.xls") {
            $this->parseByRegion();
        } else if ($planilha == "Quadrimestre_final.2013.xls") {
            $this->fourMonthsParse();
        }
    }
 
    public function historicalSeriesParse () {

        $numberOfLines = 40;
        $numberOfColumns = 15;
        
        catchKind($numberOfLines);
        crimeByKind($numberOfLines);
        
        $criminality = utf8_encode("Criminalidade");
        $policeAction = utf8_encode("A��o Policial");
        $traffic = utf8_encode("Tr�nsito");
        
        catchAvaiableYears($numberOfColumns);
        catchCrimesValues($numberOfLines);
    }
    
     /**
     * Function to catch the crimes by kind
     * @param numberOfLines     number of lines in the worksheet
     * @return void
     */
     public function crimeByKind($numberOfLines){
        for ($i = 1, $auxKind = 0; $i < $numberOfLines; $i++) {
            if (($i == 1) || ($i == 5) || ($i == 21) || ($i == 27) || ($i == 28) || ($i == 31) || ($i == 32) || ($i == 37) || ($i == 40)) {
                continue;
            } else {
                if ($i > 32) {
                    if ($i < 37) {
                        $this->kind[$this->__getCategory()[1]][$auxKind] = $this->dados->val($i, 'B', 0);
                    } else {
                        $this->kind[$this->__getCategory()[2]][$auxKind] = $this->dados->val($i, 'B', 0);
                    }
                } else {
                    if ($i < 32) {
                        $this->kind[$this->__getCategory()[0]][$auxKind] = $this->dados->val($i, 'C', 0);
                    } else if ($i > 32 && $i < 37) {
                        $this->kind[$this->__getCategory()[1]][$auxKind] = $this->dados->val($i, 'C', 0);
                    } else {
                        $this->kind[$this->__getCategory()[2]][$auxKind] = $this->dados->val($i, 'C', 0);
                    }
                }
                $auxKind++;
            }
        }
     }

     /**
     * Function to catch the avaiable years
     * @param numberOfColumns     number of columns in the worksheet
     * @return void
     */
     public function catchAvaiableYears($numberOfColumns){
          for ($i = 1, $auxTempo = 0; $i < $numberOfColumns; $i++) {
            if (($i == 1) || ($i == 2) || ($i == 3)) {
                continue;
            } else {
                $this->time[$auxTempo] = $this->dados->val(1, $i, 0);
                $auxTempo++;
            }
        }
        if (($this->__getTime() == null) || (count($this->__getTime()) != 11)) {
            throw EFailReadingSerieTime::();
        }
    }
    
    
    /**
     * Function to catch the crimes values
     * @param numberOfLines     number of lines in the worksheet
     * @return void
     */
    public function catchCrimesValues($numberOfLines){
    
        for ($i = 1, $auxLine = 0; $i < $numberOfLines; $i++) {
            if (($i == 1) || ($i == 5) || ($i == 21) || ($i == 27) || ($i == 28) || ($i == 31) || ($i == 32) || ($i == 37) || ($i == 40)) {
                continue;
            } else {
                for ($j = 4, $auxColumns = 0, $auxCategory; $j < $numberOfColumns; $j++) {
                    if ($i < 32) {
                        $auxCategory = 0;
                    } else if ($i > 32 && $i < 37) {
                        $auxCategory = 1;
                    } else {
                        $auxCategory = 2;
                    }
                    $this->crime[$this->__getKind()[$this->__getCategory()[$auxCategory]][$auxLine]][$this->__getTime()[$auxColumns]] = $this->dados->raw($i, $j, 0);
                    $auxColumns++;
                }
                $auxLine++;
            }
        }
    }
    
     /**
     * Function to accomplish parse by region: updates arrays for each field, then go for persistence.
     * @param there is no parameter
     * @return void
     */
    public function parseByRegion() {
        
        catchCategoryNames();
        
        echo "<br>";
        
        catchKindNames();
        
        echo "<br>";
        
        catchTimeNames();

        echo "<br>";
        
        catchRegionNames();
        
        echo "<br>";
        
        catchCrimeDatas();
        catchCrimeDatas2 ();
        catchCrimeDatas3();
        
        echo "<br>";
    }

    
    public function catchCategoryNames(){
    /**
         * Loop para pegar os nomes das categorias na planilha
         * @author Lucas Carvalho 
         */
        for ($i = 0, $auxCategoria = 0; $i < 45; $i++) {
            if (($i == 8) || ($i == 12) || ($i == 34) || ($i == 38) || ($i == 43)) {
                $this->category[$auxCategoria] = $this->dados->val($i, 'A', 1);
                $auxCategoria++;
            } else {
                continue;
            }
        }
    }  
    
    
    public function catchKindNames(){
    /**
         * Loop para pegar os nomes das naturezas de crimes contidas na planilha de RA
         * @author Lucas Carvalho 
         */
        for ($i = 0, $auxNatureza = 0; $i < 45; $i++) {
            // Val Ã© o valor da cÃ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
            if ($i > 7 && $i < 11) {
                $this->kind[$this->__getCategory()[0]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 32)) {
                $this->kind[$this->__getCategory()[1]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 33 && $i < 36) {
                $this->kind[$this->__getCategory()[2]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 37 && $i < 42) {
                $this->kind[$this->__getCategory()[3]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 42 && $i < 45) {
                $this->kind[$this->__getCategory()[4]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else {
                continue;
            }
        }
    }
    
    public function catchTimeNames() {

        /**
         * Loop para pegar os nomes dos tempos contidas na planilha de RA
         * @author Lucas Carvalho
         */
        for ($i = 6, $auxTempo = 0; $i < 8; $i++) {
            $this->time[$auxTempo] = $this->dados->val(7, $i, 1);
            $auxTempo++;
        }
    }
    
    public function catchRegionNames(){
    /**
         * Loop para pegar os nomes das regi�es contidas na planilha RA
         * @author Lucas Carvalho
         */
        for ($i = 0, $auxRegiao = 0; $i < 3; $i++) {
            if ($i == 0) {
                $linha = 6;
                $numeroColunas = 25;
            }
            if ($i == 1) {
                $linha = 55;
                $numeroColunas = 25;
            }
            if ($i == 2) {
                $linha = 104;
                $numeroColunas = 29;
            }
            for ($j = 0; $j < $numeroColunas; $j++) {
                if (($j < 6) || ($j % 2 != 0)) {
                    continue;
                } else {
                    $this->regiao[$auxRegiao] = $this->dados->val($linha, $j, 1);
                    $auxRegiao++;
                }
            }
        }
    }
    
    public function catchCrimeDatas(){
    /**
         * Loop para pegar os dados de crime contidas na planila de RA da primeira parte
         * @author Lucas Carvalho
         */
        for ($i = 8, $auxLinha = 0, $auxRegion = -1; $i < 45; $i++) {
            if (($i == 11) || ($i == 26) || ($i == 32) || ($i == 33) || ($i == 36) || ($i == 37) || ($i == 42)) {
                continue;
            } else {
                for ($j = 6, $auxCategory = 0; $j < 26; $j++) {
                    if (($j % 2) == 0) {
                        $auxTempo = 0;
                        $auxRegion++;
                    }
                    if (($j % 2) != 0) {
                        $auxTempo = 1;
                    }
                    if ($auxRegion == 10) {
                        $auxRegion = 0;
                    }
                    if (($i > 7 && $i < 11)) {
                        $auxCategory = 0;
                    } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 32)) {
                        $auxCategory = 1;
                    } else if (($i > 33 && $i < 36)) {
                        $auxCategory = 2;
                    } else if (($i > 37 && $i < 42)) {
                        $auxCategory = 3;
                    } else if (($i > 42 && $i < 45)) {
                        $auxCategory = 4;
                    }

                    $this->crime[$this->__getKind()[$this->__getCategory()[$auxCategory]][$auxLinha]][$this->__getRegion()[$auxRegion]][$this->__getTime()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
    }    
    
    
    public function catchCrimeDatas2 (){
        /**
         * Loop para pegar os dados de crime contidas na planila de RA da segunda parte
         * @author Lucas Carvalho
         */
        for ($i = 57, $auxLinha = 0, $auxRegiao = 9; $i < 94; $i++) {
            if (($i == 60) || ($i == 75) || ($i == 81) || ($i == 82) || ($i == 85) || ($i == 86) || ($i == 91)) {
                continue;
            } else {
                for ($j = 6, $auxCategoria = 0; $j < 26; $j++) {
                    if (($j % 2) == 0) {
                        $auxTempo = 0;
                        $auxRegiao++;
                    }
                    if (($j % 2) != 0) {
                        $auxTempo = 1;
                    }
                    if ($auxRegiao == 20) {
                        $auxRegiao = 10;
                    }
                    if (($i > 56 && $i < 60)) {
                        $auxCategoria = 0;
                    } else if (($i > 75 && $i < 81) || ($i > 60 && $i < 75)) {
                        $auxCategoria = 1;
                    } else if (($i > 82 && $i < 85)) {
                        $auxCategoria = 2;
                    } else if (($i > 86 && $i < 91)) {
                        $auxCategoria = 3;
                    } else if (($i > 91 && $i < 94)) {
                        $auxCategoria = 4;
                    }
                    $this->crime[$this->__getKind()[$this->__getCategory()[$auxCategoria]][$auxLinha]][$this->__getRegion()[$auxRegiao]][$this->__getTime()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
    }        
    
    public function catchCrimeDatas3(){
            /**
         * Loop para pegar os dados de crime contidas na planila de RA da terceira parte
         * @author Lucas Carvalho
         */
        for ($i = 106, $auxLinha = 0, $auxRegiao = 19; $i < 143; $i++) {
            if (($i == 109) || ($i == 124) || ($i == 130) || ($i == 124) || ($i == 130) || ($i == 131) || ($i == 134) || ($i == 135) || ($i == 140)) {
                continue;
            } else {
                for ($j = 6, $auxCategoria = 0; $j < 30; $j++) {
                    if (($j % 2) == 0) {
                        $auxTempo = 0;
                        $auxRegiao++;
                    }
                    if (($j % 2) != 0) {
                        $auxTempo = 1;
                    }
                    if ($auxRegiao == 32) {
                        $auxRegiao = 20;
                    }
                    if (($i > 105 && $i < 109)) {
                        $auxCategoria = 0;
                    } else if (($i > 109 && $i < 124) || ($i > 124 && $i < 130)) {
                        $auxCategoria = 1;
                    } else if (($i > 131 && $i < 134)) {
                        $auxCategoria = 2;
                    } else if (($i > 135 && $i < 140)) {
                        $auxCategoria = 3;
                    } else if (($i > 140 && $i < 143)) {
                        $auxCategoria = 4;
                    }
                    $this->crime[$this->__getKind()[$this->__getCategory()[$auxCategoria]][$auxLinha]][$this->__getRegion()[$auxRegiao]][$this->__getTime()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
    }        

    /**
     * Method to accomplish parse of four months' worksheet: updates arrays for each field, then go for persistence.
     * @return void
     */
    public function fourMonthsParse() {
        $numberOfLines = 41;
        $numberOfColumns = 14;
      
        catchCategoryName($numberOfLines);
        catchKindName($numberOfLines);
        catchTimeValues($numberOfColumns, $numberOfColumns);
       
    }
    
    public function catchKind($numberOfLines){
        //loop que pega a natureza
        for ($i = 0, $auxCategory = 0; $i < $numberOfLines; $i++) {

            if ($i == 2) {
                $this->category[$auxCategory] = $this->dados->val($i, 1, 0);
                $auxCategory++;
            }
            if ($i == 33) {
                $this->category[$auxCategory] = $this->dados->val($i, 1, 0);
                $auxCategory++;
            }
            if ($i == 38) {
                $this->category[$auxCategory] = $this->dados->val($i, 1, 0);
            }
        }
    }
    
    
    public function catchCategoryName($numberOfLines){
        /**
         * Loop to catch the names of the categories contained in the worksheet
         * @param numberOfLines     number of lines in the worksheet
         * @return void
         */
        for ($i = 0, $auxCategoria = 0; $i < $numberOfLines; $i++) {
            if (($i == 8) || ($i == 12) || ($i == 34) || ($i == 35) || ($i == 36) || ($i == 37) || ($i == 39)) {
                $this->categoria[$auxCategoria] = $this->dados->val($i, 1, 2);
                $auxCategoria++;
            } else {
                continue;
            }
        }
    }

   
    public function catchKindName($numberOfLines){
        /**
         * Loop to catch the names of the natures contained in the worksheet.
         * @param numberOfLines     number of lines in the worksheet
         * @return void
         */
        for ($i = 8, $auxKind = 0; $i < $numberOfLines; $i++) {
            // the value of the cell that is being stored in the new table val (row, column, sheet)
            if ($i > 7 && $i < 11) {
                $this->kind[$this->__getCategory()[0]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 31)) {
                $this->kind[$this->__getCategory()[1]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if ($i == 34) {
                $this->kind[$this->__getCategory()[2]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if ($i == 35) {
                $this->kind[$this->__getCategory()[3]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if ($i == 36) {
                $this->kind[$this->__getCategory()[4]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if ($i == 37) {
                $this->kind[$this->__getCategory()[5]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else if ($i > 38 && $i < 41) {
                $this->kind[$this->__getCategory()[6]][$auxKind] = $this->dados->val($i, 'B', 2);$auxKind++;
            } else {
                continue;
            }
        }
    }
    
    public function catchTimeValues($numberOfColumns){
        /** 		 
         * Loop that takes the time information from the worksheet
         * @param numberOfColumns     number of columns in the worksheet
         * @return void
         */
        for ($i = 6, $auxTempo = 0; $i < $numberOfColumns; $i++) {
            if (($i % 2) == 0) {
                $this->time[2013][$auxTempo] = $this->dados->val(6, $i, 2);
                $auxTempo++;
            }
        }
    }
    
    
    public function catchCrimeValues($numberOfLines, $numberOfColumns){
        /**
         * Loop that takes the information from the worksheet crime
         * @param numberOfLines     number of lines in the worksheet
         * @return void
         */
        for ($i = 0, $auxLinha = 0; $i < $numberOfLines; $i++) {
            if (($i < 8) || ($i == 11) || ($i == 26) || ($i == 31) || ($i == 32) || ($i == 33) || ($i == 38) || ($i == 41)) {
                continue;
            } else {
                catchColumnsValues($numberOfColumns);
                $auxLinha++;
            }
        }
    }
    
   public function catchColumnsValues($numberOfColumns){
        for ($j = 6, $auxColuna = 0, $auxCategoria = 0; $j < $numberOfColumns; $j++) {
                    if (($j % 2) == 0) {
                        continue;
                    }
                    if ($i > 7 && $i < 11) {
                        $auxCategoria = 0;
                    } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 31)) {
                        $auxCategoria = 1;
                    } else if ($i == 34) {
                        $auxCategoria = 2;
                    } else if ($i == 35) {
                        $auxCategoria = 3;
                    } else if ($i == 36) {
                        $auxCategoria = 4;
                    } else if ($i == 37) {
                        $auxCategoria = 5;
                    } else if ($i > 38 && $i < 41) {
                        $auxCategoria = 6;
                    }
                    $this->crime[$this->__getKind()[$this->__getCategory()[$auxCategoria]][$auxLinha]][$this->__getTime()[2013][$auxColuna]] = $this->dados->raw($i, $j, 2);
                    $auxColuna++;
                }
    }
    
    public function __setKind($natureza) {
        $this->kind = $natureza;
    }

    public function __getKind() {
        return $this->kind;
    }

    public function __setTime($time) {
        $this->time = $time;
    }

    public function __getTime() {
        return $this->time;
    }

    public function __setCrime($crime) {
        $this->crime = $crime;
    }

    public function __getCrime() {
        return $this->crime;
    }

    public function __setCategory($category) {
        $this->ccategory= $category;
    }

    public function __getCategory() {
        return $this->category;
    }

    public function __setRegion($region) {
        $this->region = $region;
    }

    public function __getRegion() {
        return $this->region;
    }
}
