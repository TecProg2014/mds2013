<?php

/*
  File name: CategoryTest.php
  File description: tests the class category from the package model using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/model/Category.php');

class CategoryTest extends PHPUnit_Framework_Testcase {
    /*
     * @Before
     */

    public function setUp() {
        $this->category = new category();
    }

    public function testSetIdcategory() {
        $this->assertInstanceOf('category', $this->category);
        $this->assertObjectHasAttribute('idcategory', $this->category);
        $this->category->__setIdcategory(10);
        $this->assertEquals(10, $this->category->__getIdcategory());
    }

    public function testExceptionSetIdcategory() {
        $this->assertInstanceOf('category', $this->category);
        $this->assertObjectHasAttribute('idcategory', $this->category);
        $this->setExpectedException('ETipoErrado');
        $this->category->__setIdcategory('errado');
    }

    public function testSetNomecategory() {
        $this->assertInstanceOf('category', $this->category);
        $this->assertObjectHasAttribute('idcategory', $this->category);
        $this->category->__setNomecategory("Nomecategory");
        $this->assertEquals("Nomecategory", $this->category->__getNomecategory());
    }

    public function testExceptionSetNomecategory() {
        $this->assertInstanceOf('category', $this->category);
        $this->assertObjectHasAttribute('idcategory', $this->category);
        $this->setExpectedException('ETypeWrong');
        $this->category->__setNomecategory(13);
    }

    public function testConstructOverLoad() {
        $this->assertInstanceOf('category', $this->category);
        $this->assertObjectHasAttribute('idcategory', $this->category);
        $this->category->__constructOverload(2, "nomecategory");
        $this->assertEquals(2, $this->category->__getIdcategory());
        $this->assertEquals("nomecategory", $this->category->__getNomecategory());
        $this->assertInstanceOf('category', $this->category);
    }

}

?>