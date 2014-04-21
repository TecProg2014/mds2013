<?php

/*
  File name: NaturezaControllerTeste.php
  File description: tests the class NaturezaControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/NaturezaController.php');
require_once('C:/xampp/htdocs/mds2013/model/Natureza.php');

class NaturezaControllerTeste extends PHPUnit_Framework_Testcase {

    function testConstruct() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
    }

    function testListarTodas() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertNotEmpty($object_nature_control->_listarTodas());
    }

    public function testListarTodasAlfabicamente() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertNotEmpty($object_nature_control->_listarTodasAlfabicamente());
    }

    public function testConsultarPorId() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertInstanceOf('Natureza', $object_nature_control->_consultarPorId(1));
    }

    public function testExceptionsConsultarPorId() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->setExpectedException('EErroConsulta');
        $object_nature_control->_consultarPorId('teste');
    }

    public function testConsultarPorNome() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertInstanceOf('Natureza', $object_nature_control->_consultarPorNome('Roubo de Carga'));
    }

    public function testConsultarPorIdCategoria() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertArrayHasKey(1, $object_nature_control->_consultarPorIdCategoria(1));
    }

    public function testInserirNatureza() {
        $object_nature_control = new NaturezaController();
        $object_nature_control->__constructTeste();
        $nature_instance->assertNull($object_nature_control->_inserirNatureza(new Natureza()));
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
    }

    public function testExceptionInserirNaturezaArrayParse() {
        $nobject_nature_control = new NaturezaController();
        $object_nature_control->__constructTeste();
        $nature_instance->setExpectedException('EFalhaNaturezaController');
        $result = $object_nature_control->_inserirArrayParse(1);
        $nature_instance->assertEquals('Criminalidade', $result->__getNomeCategoria());
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
    }

    public function testRetornarDadosDeNaturezaFormatado() {
        $object_nature_control = new NaturezaController();
        $nature_instance->assertObjectHasAttribute('naturezaDAO', $object_nature_control);
        $nature_instance->assertInstanceOf('NaturezaController', $object_nature_control);
        $nature_instance->assertArrayHasKey('tempo', $object_nature_control->_retornarDadosDeNaturezaFormatado('Estupro'));
    }

}
