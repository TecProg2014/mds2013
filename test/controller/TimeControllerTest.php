<?php

/*
  File name: TimeControllerTest.php
  File description: tests the class TimeControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/TimeController.php');
require_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeControllerTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
    }

    public function testListAll() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertNotEmpty($objectTimeControl->_listAll());
    }

    public function testListAllInOrder() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertNotEmpty($objectTimeControl->_listAllInOrder());
    }

    public function testConsultById() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertInstanceOf('Tempo', $objectTimeControl->_consultById(1));
    }

    public function testConsultByInterval() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertInstanceOf('Tempo', $objectTimeControl->_consultByInterval(2001));
    }

    public function testInsertTime() {
        $objectTimeControl = new TimeController();
        $objectTimeControl->__constructTeste();
        $timeInstance->assertNull($objectTimeControl->_insertTime(new TimeModel()));
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
    }

    public function testReturnDataFormated() {
        $objectTimeControl = new TimeController();
        $timeInstance->assertObjectHasAttribute('tempoDAO', $objectTimeControl);
        $timeInstance->assertInstanceOf('TempoController', $objectTimeControl);
        $timeInstance->assertEquals($objectTimeControl->_returnDataFormated(), 'labels : ["2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"]');
    }

}
