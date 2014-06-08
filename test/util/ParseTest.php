<?php

/*
  File name: ParseTest.php
  File description: tests the class Parse using asserts.
 */

require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');

class ParseTest extends PHPUnit_Framework_Testcase {

    public function testExistenciaInstanciaParseSerieHistorica() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $this->assertFileExists('C:/xampp/htdocs/mds2013/files/' . $spreadSheet);
        $parse = new Parse($spreadSheet);
        $this->assertInstanceOf("Parse", $parse);
    }

    public function testExistenciaInstanciaParseQuadrimestre() {
        $spreadSheet = "Quadrimestre_final.2013.xls";
        $this->assertFileExists('C:/xampp/htdocs/mds2013/files/' . $spreadSheet);
        $parse = new Parse($spreadSheet);
        $this->assertInstanceOf("Parse", $parse);
    }

    public function testExistenciaInstanciaParseRA() {
        $spreadSheet = "JAN_SET_2011_12  POR REGIAO ADM_2.xls";
        $this->assertFileExists('C:/xampp/htdocs/mds2013/files/' . $spreadSheet);
        $parse = new Parse($spreadSheet);
        $this->assertInstanceOf("Parse", $parse);
    }

    public function testeSetNatureza() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setKind("Natureza");
        $this->assertEquals("Natureza", $parse->__getKind());
    }

    public function testeSetCategoria() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setCategory("Categoria");
        $this->assertEquals("Categoria", $parse->__getCategory());
    }

    public function testeSetTempo() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setTime(2013);
        $this->assertEquals(2013, $parse->__getTime());
    }

    public function testeSetCrime() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setCrime(200);
        $this->assertEquals(200, $parse->__getCrime());
    }

    public function testeSetRegiao() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setRegion('N BAND');
        $this->assertEquals('N BAND', $parse->__getRegiao());
    }

}
