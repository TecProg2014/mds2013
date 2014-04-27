<?php

/*
  File name: administrativeRegionTeste.php
  File description: tests the class administrativeRegion from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/administrativeRegion.php');

class administrativeRegionTeste extends PHPUnit_Framework_Testcase {

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
        $this->setExpectedException('ETipoErrado');
        $this->administrativeRegion->__setIdadministrativeRegion("erro");
    }

    public function testSetNomeadministrativeRegion() {
        $this->administrativeRegion->__setRegionName("Regiao Administrativa");
        $this->assertEquals("Regiao Administrativa", $this->administrativeRegion->__getRegionName());
    }

    public function testExceptionSetNomeadministrativeRegion() {
        $this->setExpectedException('ETipoErrado');
        $this->administrativeRegion->__setRegionName(0);
    }

}

?>