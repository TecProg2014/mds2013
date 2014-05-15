<?php

/*
  File name: NaturezaControllerTeste.php
  File description: tests the class NaturezaControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/KindController.php');
require_once('C:/xampp/htdocs/mds2013/model/Kind.php');

class KindControllerTest extends PHPUnit_Framework_Testcase {

    function testConstruct() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
    }

    function testListarTodas() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertNotEmpty($objectKindCrimeControl->_listAllAdministrativeRegions());
    }

    public function testListarTodasAlfabicamente() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertNotEmpty($objectKindCrimeControl->_listarTodasAlfabicamente());
    }

    public function testConsultarPorId() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('Natureza', $objectKindCrimeControl->_consultAdministrativeRegionById(1));
    }

    public function testExceptionsConsultarPorId() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->setExpectedException('EErroConsulta');
        $objectKindCrimeControl->_consultAdministrativeRegionById('teste');
    }

    public function testConsultarPorNome() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('Natureza', $objectKindCrimeControl->_consultAdministrativeRegionByName('Roubo de Carga'));
    }

    public function testConsultarPorIdCategoria() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertArrayHasKey(1, $objectKindCrimeControl->_consultarPorIdCategoria(1));
    }

    public function testInserirNatureza() {
        $objectKindCrimeControl = new KindController();
        $objectKindCrimeControl->__constructTest();
        $kindCrimeInstance->assertNull($objectKindCrimeControl->_inserirNatureza(new Natureza()));
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
    }

    public function testExceptionInserirNaturezaArrayParse() {
        $objectKindCrimeControl = new KindController();
        $objectKindCrimeControl->__constructTest();
        $kindCrimeInstance->setExpectedException('EFalhaNaturezaController');
        $result = $objectKindCrimeControl->_inserirArrayParse(1);
        $kindCrimeInstance->assertEquals('Criminalidade', $result->__getCategoryName());
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
    }

    public function testRetornarDadosDeNaturezaFormatado() {
        $objectKindCrimeControl = new KindController();
        $kindCrimeInstance->assertObjectHasAttribute('naturezaDAO', $objectKindCrimeControl);
        $kindCrimeInstance->assertInstanceOf('NaturezaController', $objectKindCrimeControl);
        $kindCrimeInstance->assertArrayHasKey('tempo', $objectKindCrimeControl->_retornarDadosDeNaturezaFormatado('Estupro'));
    }

}
