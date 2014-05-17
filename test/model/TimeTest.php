<?php

/*
  File name: TimeTest.php
  File description: tests the class time from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeTest extends PHPUnit_Framework_Testcase {

    public function setUp() {
        $this->time = new time();
    }

    public function testSetIdtime() {
        $this->time->__setIdtime(1);
        $this->assertEquals(1, $this->time->__getIdtime());
    }

    public function testExceptionIdtime() {
        $this->setExpectedException('ETipoErrado');
        $this->time->__setIdtime('erro');
    }

    public function testSetIntervalo() {
        $this->time->__setIntervalo(1);
        $this->assertEquals(1, $this->time->__getIntervalo());
    }

    public function testExceptionIntervalo() {
        $this->setExpectedException('ETipoErrado');
        $this->time->__setIntervalo("erro");
    }

    public function testSetMes() {
        $this->time->__setMes('teste');
        $this->assertEquals('teste', $this->time->__getMes());
    }

    public function testConstructOverLoad() {
        $this->time->__constructOverload(1, '2001', 'janeiro');
        $this->assertEquals(1, $this->time->__getIdtime());
        $this->assertEquals('2001', $this->time->__getIntervalo());
        $this->assertEquals('janeiro', $this->time->__getMes());
    }

}

?>