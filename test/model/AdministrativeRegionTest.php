<?php

/*
  File name: AdministrativeRegionTest.php
  File description: tests the class administrativeRegion from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/AdministrativeRegion.php');

class AdministrativeRegionTest extends PHPUnit_Framework_Testcase {

    private $administrativeRegion;

    public function setUp() {
        $this->administrativeRegion = new administrativeRegion();
    }

    public function testeConstructOverLoad() {
        $this->administrativeRegion->__constructOverLoad(1, 'teste');
        $this->assertEquals(1, $this->administrativeRegion->__getIdadministrativeRegion());
        $this->assertEquals('teste', $this->administrativeRegion->__getRegionName());
    }

    public function testSetIdRegiaoAdministriva() {
        $this->administrativeRegion->__setIdadministrativeRegion(42);
        $this->assertEquals(42, $this->administrativeRegion->__getIdadministrativeRegion());
    }

    public function testExceptionSetIdadministrativeRegion() {
        $this->setExpectedException('ETypeWrong');
        $this->administrativeRegion->__setIdadministrativeRegion("erro");
    }

    public function testSetNomeadministrativeRegion() {
        $this->administrativeRegion->__setRegionName("Regiao Administrativa");
        $this->assertEquals("Regiao Administrativa", $this->administrativeRegion->__getRegionName());
    }

    public function testExceptionSetNomeadministrativeRegion() {
        $this->setExpectedException('ETypeWrong');
        $this->administrativeRegion->__setRegionName(0);
    }

}

?>