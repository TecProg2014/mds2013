<?php

/*
  File name: CrimeController.php
  File description: insert, consult, show and sum some crime informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/CrimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TempoDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/NaturezaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/RegiaoAdministrativaDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Crime.php');
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
include_once('C:/xampp/htdocs/mds2013/model/Natureza.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');

class CrimeController {

    private $crimeDAO;

    public function __construct() {
        $this->crimeDAO = new CrimeDAO();
    }

    public function __constructTeste() {
        //tests instance of crimeDAO
        $this->crimeDAO->__constructTeste();
    }

    public function _listarTodos() {
        //lists crimes
        return $this->crimeDAO->listarTodos();
    }

    public function _consultarPorId($id) {
        //consults crime by its id
        return $this->crimeDAO->consultarPorId($id);
    }

    public function _consultarPorIdkindCrime($kindCrime) {
        //consults crime by id in natures of crime
        return $this->crimeDAO->consultarPorIdkindCrime($kindCrime);
    }

    public function _consultarPorIdtime($time) {
        //consults crime by id in time of crimes
        return $this->crimeDAO->consultarPorIdkindCrime($time);
    }

    public function _inserirCrime(Crime $crime) {
        //inserts crime 
        return $this->crimeDAO->inserirCrime($crime);
    }

    public function _somaDeCrimePorkindCrime($kindCrime) {
        //crimes by nature of crime
        return $this->crimeDAO->somaDeCrimePorkindCrime($kindCrime);
    }

    public function _somaDeCrimePorkindCrimeEmyear($kindCrime, $year) {
        //crimes by nature of crime in a year
        return $this->crimeDAO->somaDeCrimePorkindCrimeEmyear($kindCrime, $year);
    }

    //Implementação de consultas para apresentacao na view | Apenas utilização de consultas já prontas
    /**
     * @author Eduardo Augusto
     * @author Sergio Silva
     * @copyright RadarCriminal 2013
     * */
    public function _somaDeCrimePorAno($year) {
        //crimes in a year
        return $this->crimeDAO->somaDeCrimePorAno($year);
    }

    /* public function _somaTotalTentativasHomicidio($year){
      return $this->crimeDAO->somaTotalTentativasHomicidio($year);
      } */

    /* public function _somaLesaoCorporal2010_2011($year){
      return $this->crimeDAO->somaLesaoCorporal2010_2011($year);
      } */

    /**
     * Elaboracao de metodo para somatorio de todos os years
     * @author Sergio Bezerra da Silva
     * @author Lucas Andrade Ribeiro
     * @copyright RadarCriminal 2013
     * */
    public function _somaCrimeTodosyears() {
        //all crimes 
        for ($i = 2001; $i < 2012; $i++) {
            $somaTodosyears[] = $this->_somaDeCrimePorAno($i);
        }

        $retornoSomaTodosyears = array_sum($somaTodosyears);
        return $retornoSomaTodosyears;
    }

    public function _inserirCrimeArrayParseSerieHistorica($arrayCrime) {
        for ($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count($arrayCrime); $i++) {
            $kindCrime = key($arrayKey);
            $dadoskindCrime = new kindCrime();
            $kindCrimeDAO = new kindCrimeDAO();
            $dadoskindCrime = $kindCrimeDAO->consultAdministrativeRegionByName($kindCrime);
            $arraytime = $arrayCrime[$kindCrime];
            for ($j = 0; $j < count(array_keys($arrayCrime[$kindCrime])); $j++) {
                $time = key($arraytime);
                $dataTime = new Tempo();
                $tempoDAO = new tempoDAO();
                $dataTime = $tempoDAO->consultarPorIntervalo($time);
                $dadosCrime = new Crime();
                $dadosCrime->__setIdkindCrime($dadoskindCrime->__getIdkindCrime());
                $dadosCrime->__setIdtime($dataTime->__getIdtime());
                $dadosCrime->__setQuantidade($arrayCrime[$kindCrime][$time]);
                $this->_inserirCrime($dadosCrime);
                next($arraytime);
            }
            next($arrayKey);
        }
        return 0;
    }

    public function _inserirCrimeArrayParseQuadrimestral($arrayCrime) {
        for ($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count($arrayCrime); $i++) {
            $kindCrime = key($arrayKey);
            $dadoskindCrime = new kindCrime();
            $kindCrimeDAO = new kindCrimeDAO();
            $dadoskindCrime = $kindCrimeDAO->consultAdministrativeRegionByName($kindCrime);
            $arraytime = $arrayCrime[$kindCrime];
            for ($j = 0; $j < count(array_keys($arrayCrime[$kindCrime])); $j++) {
                $time = key($arraytime);
                $dataTime = new Tempo();
                $tempoDAO = new tempoDAO();
                $dataTime = $tempoDAO->consultarPorMes($time);
                $dadosCrime = new Crime();
                $dadosCrime->__setIdkindCrime($dadoskindCrime->__getIdkindCrime());
                $dadosCrime->__setIdtime($dataTime->__getIdtime());
                $dadosCrime->__setQuantidade($arrayCrime[$kindCrime][$time]);
                $this->inserirCrime($dadosCrime);
                next($arraytime);
            }
            next($arrayKey);
        }
    }

    public function _inserirCrimeArrayParseRA($arrayCrime) {
        for ($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count($arrayCrime); $i++) {
            $kindCrime = key($arrayKey);
            $dadoskindCrime = new kindCrime();
            $kindCrimeDAO = new kindCrimeDAO();
            $dadoskindCrime = $kindCrimeDAO->consultAdministrativeRegionByName($kindCrime);
            $arrayRegiao = $arrayCrime[$kindCrime];
            for ($j = 0; $j < count(array_keys($arrayCrime[$kindCrime])); $j++) {
                $regiao = key($arrayRegiao);
                $dadosRegiao = new AdministrativeRegion();
                $regiaoDAO = new RegiaoAdministrativaDAO();
                $dadosRegiao = $regiaoDAO->consultAdministrativeRegionByName($regiao);
                $arraytime = $arrayCrime[$kindCrime][$regiao];
                for ($x = 0; $x < count(array_keys($arrayCrime[$kindCrime][$regiao])); $x++) {
                    $time = key($arraytime);
                    $dataTime = new Tempo();
                    $tempoDAO = new tempoDAO();
                    $dataTime = $tempoDAO->consultarPorIntervalo($time);
                    $dadosCrime = new Crime();
                    $dadosCrime->__setIdkindCrime($dadoskindCrime->__getIdkindCrime());
                    $dadosCrime->__setIdRegiaoAdministrativa($dadosRegiao->__getIdAdministrativeRegion());
                    $dadosCrime->__setIdtime($dataTime->__getIdtime());
                    $dadosCrime->__setQuantidade($arrayCrime[$kindCrime][$regiao][$time]);
                    $this->crimeDAO->inserirCrime($dadosCrime);
                    next($arraytime);
                }

                next($arrayRegiao);
            }
            next($arrayKey);
        }
    }

    //Metodo que retorna os dados para o grafico de pizza da pagina inicial
    /* public function _retornarSomaTotalCategoria(){
      $categoriaDAO = new categoriaDAO();
      $tempoDAO = new tempoDAO();
      $arrayNomesCategorias = $categoriaDAO->listarTodas();
      for($i=0; $i<count($arrayNomesCategorias);$i++){
      $nomeCategoria[$i] = $arrayNomesCategorias[$i]->__getNomeCategoria();
      }
      //$arrayDadosCategorias = $categoriaDAO->

      } */

    //Metodo duplicado para adaptacao do retorno de dados para a nova interface
    /**
     * @author Eduardo Augusto
     * @author Sergio Silva
     * @author Eliseu Egewarth
     * @copyright RadarCriminal 2013
     * */
    public function _retornarDadosDeSomaFormatoNovo() {
        //return formatted data 
        $tempoDAO = new tempoDAO();
        $dataTime = new Tempo();
        $arraydataTime = $tempoDAO->listarTodos();
        for ($i = 0; $i < count($arraydataTime); $i++) {
            $dataTime = $arraydataTime[$i];
            $dados[$i] = $dataTime->__getIntervalo();
        }
        for ($i = 0; $i < count($dados); $i++) {
            $dadosCrime[$i] = $this->_somaDeCrimePorAno($dados[$i]);
            $dadosCrimeTitle[$i] = number_format($dadosCrime[$i], 0, ',', '.');
        }



        for ($i = 0; $i < count($dadosCrime); $i++) {
            /**
             * La�o que escreve os dados do grafico de ocorrencias por year.
             * a string ("\"bar\"") define a barra cheia do grafico e 
             * a string ("\"bar simple\"") define a barra pontilhada.
             * A condicional 'if($i%2==0)' garante que as barras pontilhadas e cheias sejam intercaladas.
             * Retorna-se o vetor de strings concatenado.
             * @author Eliseu
             * @copyright RadarCriminal 2013
             */
            if ($i % 2 == 0) {
                $varbar = "\"bar\"";
            } else {
                $varbar = "\"bar simple\"";
            }
            $dadosCrimeFormatado[] = "<div class=" . $varbar . "title=\"" . $dadosCrimeTitle[$i] . " Ocorrencias\">
										<div class=\"title\">" . $dados[$i] . "</div>
										<div class=\"value\">" . $dadosCrime[$i] . "</div>
										</div>";
            if ($i != 0)
                $dadosCrimeFormatado[0] = $dadosCrimeFormatado[0] . $dadosCrimeFormatado[$i];
        }

        return $dadosCrimeFormatado[0];
    }

    //Metodo de somar todos homicícios por year
    /**
     * @author Lucas Andrade Ribeiro
     * @author Sergio Silva
     * @copyright RadarCriminal 2013
     * */
    public function _somaHomicidios2010_2011() {
        //all homicides in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaHomicidios2010_2011[] = $this->crimeDAO->somaTotalHomicidios($i);
        }

        $retornoHomicidios2010_2011 = array_sum($somaHomicidios2010_2011);
        return $retornoHomicidios2010_2011;
    }

    public function _somaCrime2010_2011() {
        //all crimes in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaCrime2010_2011[] = $this->_somaDeCrimePorAno($i);
        }
        $retornoSomaCrime2010_2011 = array_sum($somaCrime2010_2011);
        return $retornoSomaCrime2010_2011;
    }

    public function _somaTotalHomicidios() {
        //all homicides in history
        for ($i = 2001; $i < 2012; $i++) {
            $somaTotalHomicidios[] = $this->crimeDAO->somaTotalHomicidios($i);
        }

        $retornoSomaTotalHomicidios = array_sum($somaTotalHomicidios);
        return $retornoSomaTotalHomicidios;
    }

    public function _somaLesaoCorporal() {
        //all bodily injury
        for ($i = 2001; $i < 2012; $i++) {
            $somaLesaoCorporal[] = $this->crimeDAO->somaLesaoCorporal($i);
        }
        $retornoSomaLesaoCorporal = array_sum($somaLesaoCorporal);
        return $retornoSomaLesaoCorporal;
    }

    public function _somaLesaoCorporal2010_2011() {
        //all bodily injury in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaLesaoCorporal2010_2011[] = $this->_somaLesaoCorporal($i);
        }
        $retornoLesaoCorporal2010_2011 = array_sum($somaLesaoCorporal2010_2011);
        return $retornoLesaoCorporal2010_2011;
    }

    public function _somaTotalTentativasHomicidio() {
        //all homicide trys
        for ($j = 2001; $j < 2012; $j++) {
            $somaTotalTentativasHomicidio[] = $this->_somaTotalTentativasHomicidio($j);
        }
        $retornoSomaTotalTentativasHomicidio = array_sum($somaTotalTentativasHomicidio);
        return $retornoSomaTotalTentativasHomicidio;
    }

    public function _somaTotalTentativasHomicidio2010_2011() {
        //all homicide trys in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $somaTotalTentativasHomicidio2010_2011[] = $this->crimeDAO->somaTotalTentativasHomicidio($i);
        }
        $retornoSomaTotalTentativasHomicidio2010_2011 = array_sum($somaTotalTentativasHomicidio2010_2011);
        return $retornoSomaTotalTentativasHomicidio2010_2011;
    }

    public function _somarGeral() {

        return $this->crimeDAO->somarGeral();
    }

}
