<?php

/*
  File name: TimeTest.php
  File description: tests the class time from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeTest extends PHPUnit_Framework_Testcase {

    public function setUp() {
        $this->time = new TimeModel();
    }

    public function testSetIdTime() {
        $this->time->__setIdTime(1);
        $this->assertEquals(1, $this->time->__getIdTime());
    }

    public function testExceptionIdTime() {
        $this->setExpectedException('ETypeWrong');
        $this->time->__setIdTime('erro');
    }

    public function testSetInterval() {
        $this->time->__setInterval(1);
        $this->assertEquals(1, $this->time->__getInterval());
    }

    public function testExceptionInterval() {
        $this->setExpectedException('ETypeWrong');
        $this->time->__setInterval("erro");
    }

    public function testSetMonth() {
        $this->time->__setMonth('teste');
        $this->assertEquals('teste', $this->time->__getMonth());
    }

    public function testConstructOverLoad() {
        $this->time->__constructOverload(1, '2001', 'janeiro');
        $this->assertEquals(1, $this->time->__getIdTime());
        $this->assertEquals('2001', $this->time->__getInterval());
        $this->assertEquals('janeiro', $this->time->__getMonth());
    }

}

?>