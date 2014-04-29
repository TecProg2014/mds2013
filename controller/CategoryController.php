<?php

/*
  File name: CategoriaController.php
  File description: insert, consult, show and sum some category information
 */

include_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoriaController {

    private $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function __constructTeste() {
        //tests instance of categoriaDAO
        $this->categoriaDAO->__constructTest();
    }

    public function _listarTodas() {
        //lists categorys
        $arrayCategoria = $this->categoriaDAO->listAllCategories();
        return $arrayCategoria;
    }

    public function _listarTodasAlfabicamente() {
        //lists categorys alphabeticaly
        return $this->categoriaDAO->listAllCategoriesAlphabetically();
    }

    public function _consultarPorId($id) {
        //consults category by its id	
        if (!is_numeric($id)) {
            throw new EErroConsulta();
        }
        $category = $this->categoriaDAO->consultCategoryById($id);
        return $category;
    }

    public function _consultarPorNome($categoryName) {
        //consults category by name	
        if (!is_string($categoryName)) {
            throw new EErroConsulta();
        }
        $category = $this->categoriaDAO->consultCategoryByName($categoryName);
        return $category;
    }

    public function _inserirCategoria(Category $category) {
        //inserts categories
        return $this->categoriaDAO->insertCategory($category);
    }

    public function _inserirCategoriaArrayParseSerie($arraycategory) {
        if (!is_array($arraycategory)) {
            throw new EErroConsulta();
        }
        $dateCategory = new Category();
        for ($i = 0; $i < count($arraycategory); $i++) {
            $dateCategory->__setcategoryName($arraycategory[$i]);
            $retorno = $this->categoriaDAO->insertCategory($dateCategory);
        }
        return $retorno;
    }

    public function _somaTotalFurtos() {
        //all thefts category
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalThefts[] = $this->categoriaDAO->sumOfThefts($i);
        }
        $returnSumTotalThefts = array_sum($sumTotalThefts);
        return $returnSumTotalThefts;
    }

    public function _somaTotalDignidadeSexual() {
        //all crimes in sexual dignity category
        $sumSexualDignity;
        for ($i = 2001; $i < 2012; $i++) {
            $sumSexualDignity[] = $this->_somaTotalDignidadeSexual($i);
        }
        $retornoSomaTotalDignidadeSexual = array_sum($sumSexualDignity);
        return $retornoSomaTotalDignidadeSexual;
    }

    public function _somaTotalDignidadeSexual2010_2011() {
        //all crimes in sexual dignity in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalSexualDignity2010_2011[] = $this->_somaTotalDignidadeSexual($i);
        }
        $returnSumTotalSexualDignity2010_2011 = array_sum($sumTotalSexualDignity2010_2011);
        return $returnSumTotalSexualDignity2010_2011;
    }

    public function _somaTotalAcaoPolicial() {
        //all policial actions
        for ($i = 2001; $i < 2012; $i++) {
            $somaTotalAcaoPolicial[] = $this->_somaTotalAcaoPolicial($i);
        }
        $retornoSomaTotalAcaoPolicial = array_sum($somaTotalAcaoPolicial);
        return $retornoSomaTotalAcaoPolicial;
    }

    public function _sumOfPoliceActions2010_2011() {
        //all policial actions in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaTotalAcaoPolicial2010_2011[] = $this->_somaTotalAcaoPolicial($i);
        }
        $retornoSomaTotalAcaoPolicial2010_2011 = array_sum($somaTotalAcaoPolicial2010_2011);
        return $retornoSomaTotalAcaoPolicial2010_2011;
    }

    public function _somaGeralCrimeContraPessoa() {
        //all crimes against person category
        for ($i = 2001; $i < 2012; $i++) {
            $somaGeralCrimeContraPessoa[] = $this->categoriaDAO->sumOfCrimesAgainstPerson($i);
        }
        $retornoSomaGeralCrimeContraPessoa = array_sum($somaGeralCrimeContraPessoa);
        return $retornoSomaGeralCrimeContraPessoa;
    }

    public function _somaGeralCrimeContraPessoa2010_2011() {
        //all crimes against person in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaGeralCrimeContraPessoa2010_2011[] = $this->categoriaDAO->sumOfCrimesAgainstPerson($i);
        }
        $retornoSomaGeralCrimeContraPessoa2010_2011 = array_sum($somaGeralCrimeContraPessoa2010_2011);
        return $retornoSomaGeralCrimeContraPessoa2010_2011;
    }

    public function _somaTotalRoubo() {
        //all robberies categories
        for ($i = 2001; $i < 2012; $i++) {
            $sumTotalStealing[] = $this->categoriaDAO->sumOfSteals($i);
        }
        $retornoSomaTotalRoubo = array_sum($sumTotalStealing);
        return $retornoSomaTotalRoubo;
    }

    public function _somaTotalRoubo2010_2011() {
        //all robberies in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalStealing2010_2011[] = $this->_sumTotalStealing($i);
        }
        $retornosumTotalStealing2010_2011 = array_sum($sumTotalStealing2010_2011);
        return $retornosumTotalStealing2010_2011;
    }

    public function _contarRegistros() {
        //count records
        return $this->categoriaDAO->countCategoryRegisters();
    }

    public function _listarTotalDeCategoria() {
        //lists all categories
        $categories = $this->categoriaDAO->listTotalOfCategories();
        return "
		var data = [
		{ label: \"" . $categories["nome"][0] . "\",  data: " . $categories["quantidade"][0] . "},
		{ label: \"" . $categories["nome"][1] . "\",  data: " . $categories["quantidade"][1] . "},
		{ label: \"" . $categories["nome"][2] . "\",  data: " . $categories["quantidade"][2] . "},
		{ label: \"" . $categories["nome"][3] . "\",  data: " . $categories["quantidade"][3] . "},
		{ label: \"" . $categories["nome"][4] . "\",  data: " . $categories["quantidade"][4] . "}
		];";
    }

}
