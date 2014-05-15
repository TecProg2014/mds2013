<?php

/*
  File name: TempoControllerTeste.php
  File description: tests the class TempoControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/TimeController.php');
require_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeControllerTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
    }

    public function testListarTodas() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertNotEmpty($objectTimeControl->_listarTodos());
    }

    public function testListarTodasEmOrdem() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertNotEmpty($objectTimeControl->_listarTodasEmOrdem());
    }

    public function testConsultarPorId() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertInstanceOf('Tempo', $objectTimeControl->_consultarPorId(1));
    }

    public function testConsultarPorIntervalo() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertInstanceOf('Tempo', $objectTimeControl->_consultarPorIntervalo(2001));
    }

    public function testInserirTempo() {
        $objectTimeControl = new TimeController();
        $objectTimeControl->__constructTeste();
        $timeInstance->assertNull($objectTimeControl->_inserirTempo(new Time()));
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
    }

    public function testRetornaDadosFormatados() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertEquals($objectTimeControl->_retornarDadosFormatados(), 'labels : ["2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"]');
    }

}
