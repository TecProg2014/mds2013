<?php

/*
  File name: CategoryControllerTest.php
  File description: tests the class CrimeControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
require_once('C:/xampp/htdocs/mds2013/model/Crime.php');

class CrimeControllerTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
    }

    public function testListarTodas() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertNotEmpty($objectCrimeControl->_listarTodos());
    }

    public function testConsultarPorId() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertInstanceOf('Crime', $objectCrimeControl->_consultarPorId(1));
    }

    public function testConsultarPorIdNatureza() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertInstanceOf('Crime', $objectCrimeControl->_consultarPorIdNatureza(1));
    }

    public function testSomaCrimeTodosAnos() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(1403323, $objectCrimeControl->_somaCrimeTodosAnos());
    }

    public function testRetornarDadosDeSomaFormatoNovo() {
        $testScript = "<div class=\"bar\"title=\"107.661 Ocorrencias\">
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
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals($testScript, $objectCrimeControl->_retornarDadosDeSomaFormatoNovo());
    }

    public function testConsultarPorIdTempo() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertInstanceOf('Crime', $objectCrimeControl->_consultarPorIdTempo(1));
    }

    public function testInserirCrime() {
        $objectCrimeControl = new CrimeController();
        $objectCrimeControl->__constructTeste();
        $timeInstance->assertNull($objectCrimeControl->_inserirCrime(new Crime()));
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
    }

    public function testSomaDeCrimePorAno() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(125192, $objectCrimeControl->_somaDeCrimePorAno(2011));
    }

    public function testSomaDeCrimePorNatureza() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(6633, $objectCrimeControl->_somaDeCrimePorNatureza('Estupro'));
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
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(13122, $objectCrimeControl->_somaHomicidios2010_2011());
    }

    public function testSomaCrime2010_2011() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(250464, $objectCrimeControl->_somaCrime2010_2011());
    }

    public function testSomaTotalHomicidios() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(72171, $objectCrimeControl->_somaTotalHomicidios());
    }

    public function testSomaLesaoCorporal() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(1450746, $objectCrimeControl->_somaLesaoCorporal());
    }

    public function testSomaLesaoCorporal2010_2011() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(2901492, $objectCrimeControl->_somaLesaoCorporal2010_2011());
    }

    public function testSomaTotalTentativasHomicidios2010_2011() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(20400, $objectCrimeControl->_somaTotalTentativasHomicidio2010_2011());
    }

    public function testSomarGeral() {
        $objectCrimeControl = new CrimeController();
        $timeInstance->assertObjectHasAttribute('crimeDAO', $objectCrimeControl);
        $timeInstance->assertInstanceOf('CrimeController', $objectCrimeControl);
        $timeInstance->assertEquals(69758681, $objectCrimeControl->_somarGeral());
    }

}
