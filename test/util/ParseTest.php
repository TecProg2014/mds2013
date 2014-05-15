<?php

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
        $parse->__setNatureza("Natureza");
        $this->assertEquals("Natureza", $parse->__getNatureza());
    }

    public function testeSetCategoria() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setCategoria("Categoria");
        $this->assertEquals("Categoria", $parse->__getCategoria());
    }

    public function testeSetTempo() {
        $spreadSheet = "s�rie hist�rica - 2001 - 2012 2.xls";
        $parse = new Parse($spreadSheet);
        $parse->__setTempo(2013);
        $this->assertEquals(2013, $parse->__getTempo());
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
        $parse->__setRegiao('N BAND');
        $this->assertEquals('N BAND', $parse->__getRegiao());
    }

}
