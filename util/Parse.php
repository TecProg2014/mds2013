<?php

require_once ('C:/xampp/htdocs/mds2013/exceptions/ENomePlanilhaIncompativel.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EPlanilhaSerieIncompativel.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFalhaLeituraSerieCategoria.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFalhaLeituraSerieNatureza.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFalhaLeituraSerieTempo.php');
require_once ('C:/xampp/htdocs/mds2013/exceptions/EFalhaLeituraSerieCrime.php');
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
            $this->parseDeSerieHistorica();
        } else if ($planilha == "JAN_SET_2011_12  POR REGIAO ADM_2.xls") {
            $this->parsePorRegiao();
        } else if ($planilha == "Quadrimestre_final.2013.xls") {
            $this->parseDeQuadrimestre();
        }
    }

    //ParsePorSerieHistorica 
    public function parseDeSerieHistorica() {

        $numeroLinhas = 40;
        $numeroColunas = 15;
        //loop que pega a natureza
        for ($i = 0, $auxCategoria = 0; $i < $numeroLinhas; $i++) {

            if ($i == 2) {
                $this->category[$auxCategoria] = $this->dados->val($i, 1, 0);
                $auxCategoria++;
            }
            if ($i == 33) {
                $this->category[$auxCategoria] = $this->dados->val($i, 1, 0);
                $auxCategoria++;
            }
            if ($i == 38) {
                $this->category[$auxCategoria] = $this->dados->val($i, 1, 0);
            }
        }
        //loop que pega natureza do crime
        for ($i = 1, $auxNatureza = 0; $i < $numeroLinhas; $i++) {
            if (($i == 1) || ($i == 5) || ($i == 21) || ($i == 27) || ($i == 28) || ($i == 31) || ($i == 32) || ($i == 37) || ($i == 40)) {
                continue;
            } else {
                if ($i > 32) {
                    if ($i < 37) {
                        $this->kind[$this->__getCategoria()[1]][$auxNatureza] = $this->dados->val($i, 'B', 0);
                    } else {
                        $this->kind[$this->__getCategoria()[2]][$auxNatureza] = $this->dados->val($i, 'B', 0);
                    }
                } else {
                    if ($i < 32) {
                        $this->kind[$this->__getCategoria()[0]][$auxNatureza] = $this->dados->val($i, 'C', 0);
                    } else if ($i > 32 && $i < 37) {
                        $this->kind[$this->__getCategoria()[1]][$auxNatureza] = $this->dados->val($i, 'C', 0);
                    } else {
                        $this->kind[$this->__getCategoria()[2]][$auxNatureza] = $this->dados->val($i, 'C', 0);
                    }
                }
                $auxNatureza++;
            }
        }
        $criminalidade = utf8_encode("Criminalidade");
        $acao = utf8_encode("A��o Policial");
        $transito = utf8_encode("Tr�nsito");
        //loop que pega os anos disponiveis
        for ($i = 1, $auxTempo = 0; $i < $numeroColunas; $i++) {
            if (($i == 1) || ($i == 2) || ($i == 3)) {
                continue;
            } else {
                $this->time[$auxTempo] = $this->dados->val(1, $i, 0);
                $auxTempo++;
            }
        }
        if (($this->__getTempo() == null) || (count($this->__getTempo()) != 11)) {
            throw EFalhaLeituraSerieTempo();
        }
        //loop que pega os dados do crime
        for ($i = 1, $auxLinha = 0; $i < $numeroLinhas; $i++) {
            if (($i == 1) || ($i == 5) || ($i == 21) || ($i == 27) || ($i == 28) || ($i == 31) || ($i == 32) || ($i == 37) || ($i == 40)) {
                continue;
            } else {
                for ($j = 4, $auxColuna = 0, $auxCategoria; $j < $numeroColunas; $j++) {
                    if ($i < 32) {
                        $auxCategoria = 0;
                    } else if ($i > 32 && $i < 37) {
                        $auxCategoria = 1;
                    } else {
                        $auxCategoria = 2;
                    }
                    $this->crime[$this->__getNatureza()[$this->__getCategoria()[$auxCategoria]][$auxLinha]][$this->__getTempo()[$auxColuna]] = $this->dados->raw($i, $j, 0);
                    $auxColuna++;
                }
                $auxLinha++;
            }
        }
    }

//fim do metodo parseDeSerieHistorica

    /**
     * 	Desenvolvimento do m�todo para efetuar parse da planilha de crimes por Regi�o Administrativa
     * 	@access public
     * 	@author Lucas Carvalho
     * 	@tutorial M�todo realizado durante sprint 4, atualizando arrays para cada campo, para depois ir para persist�ncia.
     */
    public function parsePorRegiao() {
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
        //print_r($this->__getCategoria());
        echo "<br>";
        /**
         * Loop para pegar os nomes das naturezas de crimes contidas na planilha de RA
         * @author Lucas Carvalho 
         */
        for ($i = 0, $auxNatureza = 0; $i < 45; $i++) {
            // Val Ã© o valor da cÃ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
            if ($i > 7 && $i < 11) {
                $this->kind[$this->__getCategoria()[0]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 32)) {
                $this->kind[$this->__getCategoria()[1]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 33 && $i < 36) {
                $this->kind[$this->__getCategoria()[2]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 37 && $i < 42) {
                $this->kind[$this->__getCategoria()[3]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else if ($i > 42 && $i < 45) {
                $this->kind[$this->__getCategoria()[4]][$auxNatureza] = $this->dados->val($i, 'B', 1);
                $auxNatureza++;
            } else {
                continue;
            }
        }
        //print_r($this->__getNatureza());
        echo "<br>";
        /**
         * Loop para pegar os nomes dos tempos contidas na planilha de RA
         * @author Lucas Carvalho
         */
        for ($i = 6, $auxTempo = 0; $i < 8; $i++) {
            $this->time[$auxTempo] = $this->dados->val(7, $i, 1);
            $auxTempo++;
        }

        //print_r($this->__getTempo());
        echo "<br>";
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
        //print_r($this->__getRegiao());
        echo "<br>";
        /**
         * Loop para pegar os dados de crime contidas na planila de RA da primeira parte
         * @author Lucas Carvalho
         */
        for ($i = 8, $auxLinha = 0, $auxRegiao = -1; $i < 45; $i++) {
            if (($i == 11) || ($i == 26) || ($i == 32) || ($i == 33) || ($i == 36) || ($i == 37) || ($i == 42)) {
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
                    if ($auxRegiao == 10) {
                        $auxRegiao = 0;
                    }
                    if (($i > 7 && $i < 11)) {
                        $auxCategoria = 0;
                    } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 32)) {
                        $auxCategoria = 1;
                    } else if (($i > 33 && $i < 36)) {
                        $auxCategoria = 2;
                    } else if (($i > 37 && $i < 42)) {
                        $auxCategoria = 3;
                    } else if (($i > 42 && $i < 45)) {
                        $auxCategoria = 4;
                    }

                    $this->crime[$this->__getNatureza()[$this->__getCategoria()[$auxCategoria]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
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
                    $this->crime[$this->__getNatureza()[$this->__getCategoria()[$auxCategoria]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
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
                    $this->crime[$this->__getNatureza()[$this->__getCategoria()[$auxCategoria]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i, $j, 1);
                }
                $auxLinha++;
            }
        }
        echo "<br>";
        //print_r($this->__getCrime());
    }

    /**
     * 	Desenvolvimento do m�todo para efetuar parse da planilha de quadrimestre
     * 	@access public
     * 	@author Bruno Rodrigues
     * 	@author Eliseu Egewarth
     * 	@author Lucas Andrade	
     * 	@author Lucas Carvalho
     * 	@author Lucas Santos
     * 	@author S�rgio Bezerra
     * 	@author Thiago Honorato
     * 	@tutorial M�todo realizado durante sprint 2, atulizando arrays para cada campo, para depois ir para persist�ncia.
     */
    public function parseDeQuadrimestre() {
        $numeroLinhas = 41;
        $numeroColunas = 14;
        /**
         * Loop para pegar os nomes das categorias contidas na planilha
         * @author Lucas Carvalho
         * @tutorial Refatora��o do metodo antes implementados por outros autores 	 
         */
        for ($i = 0, $auxCategoria = 0; $i < $numeroLinhas; $i++) {
            if (($i == 8) || ($i == 12) || ($i == 34) || ($i == 35) || ($i == 36) || ($i == 37) || ($i == 39)) {
                $this->categoria[$auxCategoria] = $this->dados->val($i, 1, 2);
                $auxCategoria++;
            } else {
                continue;
            }
        }
        /**
         * Loop para pegar os nomes das naturezas contidas na planilha
         * @author Lucas Carvalho
         * @author S�rgio Bezerra
         * @tutorial Refatora��o para ajustar dimen��es do vetor natureza para diminuir a complexidade de popula��o do vetor
         */
        for ($i = 8, $auxNatureza = 0; $i < $numeroLinhas; $i++) {
            // Val Ã© o valor da cÃ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
            if ($i > 7 && $i < 11) {
                $this->kind[$this->__getCategoria()[0]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if (($i > 11 && $i < 26) || ($i > 26 && $i < 31)) {
                $this->kind[$this->__getCategoria()[1]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if ($i == 34) {
                $this->kind[$this->__getCategoria()[2]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if ($i == 35) {
                $this->kind[$this->__getCategoria()[3]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if ($i == 36) {
                $this->kind[$this->__getCategoria()[4]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if ($i == 37) {
                $this->kind[$this->__getCategoria()[5]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else if ($i > 38 && $i < 41) {
                $this->kind[$this->__getCategoria()[6]][$auxNatureza] = $this->dados->val($i, 'B', 2);
                $auxNatureza++;
            } else {
                continue;
            }
        }

        /** 		 
         * Loop que pega as informa��es sobre tempo da planilha
         * @author Lucas Carvalho
         */
        for ($i = 6, $auxTempo = 0; $i < $numeroColunas; $i++) {
            if (($i % 2) == 0) {
                $this->time[2013][$auxTempo] = $this->dados->val(6, $i, 2);
                $auxTempo++;
            }
        }
        /**
         * Loop que pega as informa��es do crime da planilha
         * @author Lucas Carvalho 
         */
        for ($i = 0, $auxLinha = 0; $i < $numeroLinhas; $i++) {
            if (($i < 8) || ($i == 11) || ($i == 26) || ($i == 31) || ($i == 32) || ($i == 33) || ($i == 38) || ($i == 41)) {
                continue;
            } else {
                for ($j = 6, $auxColuna = 0, $auxCategoria = 0; $j < $numeroColunas; $j++) {
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
                    $this->crime[$this->__getNatureza()[$this->__getCategoria()[$auxCategoria]][$auxLinha]][$this->__getTempo()[2013][$auxColuna]] = $this->dados->raw($i, $j, 2);
                    $auxColuna++;
                }
                $auxLinha++;
            }
        }
    }

    public function __setNatureza($natureza) {
        $this->kind = $natureza;
    }

    public function __getNatureza() {
        return $this->kind;
    }

    public function __setTempo($time) {
        $this->time = $time
    }

    public function __getTempo() {
        return $this->time;
    }

    public function __setCrime($crime) {
        $this->crime = $crime;
    }

    public function __getCrime() {
        return $this->crime;
    }

    public function __setCategoria($category) {
        $this->ccategory= $category;
    }

    public function __getCategoria() {
        return $this->category;
    }

    public function __setRegiao($regiao) {
        $this->regiao = $regiao;
    }

    public function __getRegiao() {
        return $this->regiao;
    }

}
