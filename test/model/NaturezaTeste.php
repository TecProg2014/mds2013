<?php

/*
  File name: kindTeste.php
  File description: tests the class kind from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/kind.php');

class kindTeste extends PHPUnit_Framework_Testcase {

    public function setUp() {
        $this->kind = new kind();
    }

    public function testeIdkind() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $kind->__setIdkind(12);
        $this->assertEquals(12, $kind->__getIdkind());
    }

    public function testExceptionSetIdkind() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $this->setExpectedException('ETipoErrado');
        $kind->__setIdkind("erro");
    }

    public function testekind() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $kind->__setkind("teste");
        $this->assertEquals("teste", $kind->__getkind());
    }

    public function testExceptionSetkind() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $this->setExpectedException('ETipoErrado');
        $kind->__setkind(10);
    }

    public function testExceptionSetIdCategoria() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $this->setExpectedException('ETipoErrado');
        $kind->__setIdCategory("erro");
    }

    public function testeIdCategoria() {
        $kind = new kind();
        $this->assertInstanceOf('kind', $kind);
        $this->assertObjectHasAttribute('idkind', $kind);
        $kind->__setIdCategory(10);
        $this->assertEquals(10, $kind->__getIdCategory());
    }

    public function testeConstructOverLoad() {
        $this->kind->__constructOverload(1, "kind", 2);
        $this->assertEquals(1, $this->kind->__getIdkind());
        $this->assertEquals("kind", $this->kind->__getkind());
        $this->assertEquals(2, $this->kind->__getIdCategory());
    }

}

?>