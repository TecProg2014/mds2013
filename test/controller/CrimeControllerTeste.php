<?php

/*
  File name: CategoriaControllerTeste.php
  File description: tests the class CrimeControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
require_once('C:/xampp/htdocs/mds2013/model/Crime.php');

class CrimeControllerTeste extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
    }

    public function testListarTodas() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertNotEmpty($object_crime_control->_listarTodos());
    }

    public function testConsultarPorId() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertInstanceOf('Crime', $object_crime_control->_consultarPorId(1));
    }

    public function testConsultarPorIdNatureza() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertInstanceOf('Crime', $object_crime_control->_consultarPorIdNatureza(1));
    }

    public function testSomaCrimeTodosAnos() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(1403323, $object_crime_control->_somaCrimeTodosAnos());
    }

    public function testRetornarDadosDeSomaFormatoNovo() {
        $test_script = "<div class=\"bar\"title=\"107.661 Ocorrencias\">
\t\t\t\t\t\t\t\t\t\t<div class=\"title\">2001</div>
										<div class=\"value\">107661</div>
										</div><div class=\"bar simple\"title=\"116.628 Ocorrencias\">
										<div class=\"title\">2002</div>
										<div class=\"value\">116628</div>
										</div><div class=\"bar\"title=\"135.033 Ocorrencias\">
										<div class=\"title\">2003</div>
										<div class=\"value\">135033</div>
										</div><div class=\"bar simple\"title=\"133.676 Ocorrencias\">
										<div class=\"title\">2004</div>
										<div class=\"value\">133676</div>
										</div><div class=\"bar\"title=\"129.797 Ocorrencias\">
										<div class=\"title\">2005</div>
										<div class=\"value\">129797</div>
										</div><div class=\"bar simple\"title=\"136.812 Ocorrencias\">
										<div class=\"title\">2006</div>
										<div class=\"value\">136812</div>
										</div><div class=\"bar\"title=\"129.592 Ocorrencias\">
										<div class=\"title\">2007</div>
										<div class=\"value\">129592</div>
										</div><div class=\"bar simple\"title=\"131.684 Ocorrencias\">
										<div class=\"title\">2008</div>
										<div class=\"value\">131684</div>
										</div><div class=\"bar\"title=\"131.976 Ocorrencias\">
										<div class=\"title\">2009</div>
										<div class=\"value\">131976</div>
										</div><div class=\"bar simple\"title=\"125.272 Ocorrencias\">
										<div class=\"title\">2010</div>
										<div class=\"value\">125272</div>
										</div><div class=\"bar\"title=\"125.192 Ocorrencias\">
										<div class=\"title\">2011</div>
										<div class=\"value\">125192</div>
										</div><div class=\"bar simple\"title=\"125.192 Ocorrencias\">
										<div class=\"title\">2011</div>
										<div class=\"value\">125192</div>
										</div><div class=\"bar\"title=\"0 Ocorrencias\">
										<div class=\"title\">2012</div>
										<div class=\"value\"></div>
										</div>";
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals($scriptTeste, $object_crime_control->_retornarDadosDeSomaFormatoNovo());
    }

    public function testConsultarPorIdTempo() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertInstanceOf('Crime', $object_crime_control->_consultarPorIdTempo(1));
    }

    public function testInserirCrime() {
        $object_crime_control = new CrimeController();
        $object_crime_control->__constructTeste();
        $time_instance->assertNull($object_crime_control->_inserirCrime(new Crime()));
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
    }

    public function testSomaDeCrimePorAno() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(125192, $object_crime_control->_somaDeCrimePorAno(2011));
    }

    public function testSomaDeCrimePorNatureza() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(6633, $object_crime_control->_somaDeCrimePorNatureza('Estupro'));
    }

    /*
      public function testinserirCrimeArrayParseSerieHistorica()
      {
      $crimeController = new CrimeController();
      $crimeController->__constructTeste();
      $array['Estupro']['2001'] = 1;
      $this->assertEquals(0,$crimeController->_inserirCrimeArrayParseSerieHistorica($array));
      } */

    public function testSomaHomicidios2010_2011() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(13122, $object_crime_control->_somaHomicidios2010_2011());
    }

    public function testSomaCrime2010_2011() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(250464, $object_crime_control->_somaCrime2010_2011());
    }

    public function testSomaTotalHomicidios() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(72171, $object_crime_control->_somaTotalHomicidios());
    }

    public function testSomaLesaoCorporal() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(1450746, $object_crime_control->_somaLesaoCorporal());
    }

    public function testSomaLesaoCorporal2010_2011() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(2901492, $object_crime_control->_somaLesaoCorporal2010_2011());
    }

    public function testSomaTotalTentativasHomicidios2010_2011() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(20400, $object_crime_control->_somaTotalTentativasHomicidio2010_2011());
    }

    public function testSomarGeral() {
        $object_crime_control = new CrimeController();
        $time_instance->assertObjectHasAttribute('crimeDAO', $object_crime_control);
        $time_instance->assertInstanceOf('CrimeController', $object_crime_control);
        $time_instance->assertEquals(69758681, $object_crime_control->_somarGeral());
    }

}
