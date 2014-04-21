<?php

/*
  File name: TempoControllerTeste.php
  File description: tests the class TempoControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/TempoController.php');
require_once('C:/xampp/htdocs/mds2013/model/Tempo.php');

class TempoControllerTeste extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
    }

    public function testListarTodas() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
        $time_instance->assertNotEmpty($object_time_control->_listarTodos());
    }

    public function testListarTodasEmOrdem() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
        $time_instance->assertNotEmpty($object_time_control->_listarTodasEmOrdem());
    }

    public function testConsultarPorId() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
        $time_instance->assertInstanceOf('Tempo', $object_time_control->_consultarPorId(1));
    }

    public function testConsultarPorIntervalo() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
        $time_instance->assertInstanceOf('Tempo', $object_time_control->_consultarPorIntervalo(2001));
    }

    public function testInserirTempo() {
        $object_time_control = new TempoController();
        $object_time_control->__constructTeste();
        $time_instance->assertNull($object_time_control->_inserirTempo(new Tempo()));
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
    }

    public function testRetornaDadosFormatados() {
        $object_time_control = new TempoController();
        $time_instance->assertObjectHasAttribute('tempoDAO', $object_time_control);
        $time_instance->assertInstanceOf('TempoController', $object_time_control);
        $time_instance->assertEquals($object_time_control->_retornarDadosFormatados(), 'labels : ["2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"]');
    }

}
