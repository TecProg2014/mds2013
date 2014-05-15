<?php

require_once('C:/xampp/htdocs/mds2013/persistence/CrimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');

class CrimeDAOTest extends PHPUnit_Framework_TestCase {

    function testConstruct() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
    }

    public function testListarTodas() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertNotEmpty($objectCrimeDAO->listarTodos());
        $crimeDaoInstance->assertNotNull($objectCrimeDAO->listarTodos());
    }

    public function testConsultarPorId() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('Crime', $objectCrimeDAO->consultarPorId(1));
        $crimeDaoInstance->assertObjectHasAttribute('idCrime', $objectCrimeDAO->consultarPorId(1));
    }

    public function testConsultarPorIdNatureza() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('Crime', $objectCrimeDAO->consultarPorIdNatureza(1));
        $crimeDaoInstance->assertObjectHasAttribute('idCrime', $objectCrimeDAO->consultarPorIdNatureza(1));
    }

    public function testConsultarPorIdTempo() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('Crime', $objectCrimeDAO->consultarPorIdTempo(1));
        $crimeDaoInstance->assertObjectHasAttribute('idCrime', $objectCrimeDAO->consultarPorIdTempo(1));
    }

    public function testSomaDeCrimePorAno() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertNotNull($objectCrimeDAO->somaDeCrimePorAno(2001));
        $crimeDaoInstance->assertEquals(107661, $objectCrimeDAO->somaDeCrimePorAno(2001));
    }

    public function testSomaDeCrimePorNatureza() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertNotNull($objectCrimeDAO->somaDeCrimePorNatureza('Estupro'));
        $crimeDaoInstance->assertEquals(6633, $objectCrimeDAO->somaDeCrimePorNatureza('Estupro'));
    }

    public function testSomaDeCrimePorNaturezaEmAno() {
        $objectCrimeDAO = new CrimeDAO();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $crimeDaoInstance->assertNotNull($objectCrimeDAO->somaDeCrimePorNaturezaEmAno('Estupro', 2001));
        $crimeDaoInstance->assertEquals(740, $objectCrimeDAO->somaDeCrimePorNaturezaEmAno('Estupro', 2001));
    }

    public function testeInserirCrime() {
        $objectCrimeDAO = new CrimeDAO();
        $objectCrimeDAO->__constructTeste();
        $crimeDaoInstance->assertObjectHasAttribute('conexao', $objectCrimeDAO);
        $crimeDaoInstance->assertInstanceOf('CrimeDAO', $objectCrimeDAO);
        $objectCrimeDAO->inserirCrime(new Crime());
    }

}
