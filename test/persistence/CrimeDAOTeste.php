<?php

require_once('C:/xampp/htdocs/mds2013/persistence/CrimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');

class CrimeDAOTeste extends PHPUnit_Framework_TestCase {

    function testConstruct() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
    }

    public function testListarTodas() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertNotEmpty($object_crime_DAO->listarTodos());
        $crime_dao_instance->assertNotNull($object_crime_DAO->listarTodos());
    }

    public function testConsultarPorId() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('Crime', $object_crime_DAO->consultarPorId(1));
        $crime_dao_instance->assertObjectHasAttribute('idCrime', $object_crime_DAO->consultarPorId(1));
    }

    public function testConsultarPorIdNatureza() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('Crime', $object_crime_DAO->consultarPorIdNatureza(1));
        $crime_dao_instance->assertObjectHasAttribute('idCrime', $object_crime_DAO->consultarPorIdNatureza(1));
    }

    public function testConsultarPorIdTempo() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('Crime', $object_crime_DAO->consultarPorIdTempo(1));
        $crime_dao_instance->assertObjectHasAttribute('idCrime', $object_crime_DAO->consultarPorIdTempo(1));
    }

    public function testSomaDeCrimePorAno() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertNotNull($object_crime_DAO->somaDeCrimePorAno(2001));
        $crime_dao_instance->assertEquals(107661, $object_crime_DAO->somaDeCrimePorAno(2001));
    }

    public function testSomaDeCrimePorNatureza() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertNotNull($object_crime_DAO->somaDeCrimePorNatureza('Estupro'));
        $crime_dao_instance->assertEquals(6633, $object_crime_DAO->somaDeCrimePorNatureza('Estupro'));
    }

    public function testSomaDeCrimePorNaturezaEmAno() {
        $object_crime_DAO = new CrimeDAO();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $crime_dao_instance->assertNotNull($object_crime_DAO->somaDeCrimePorNaturezaEmAno('Estupro', 2001));
        $crime_dao_instance->assertEquals(740, $object_crime_DAO->somaDeCrimePorNaturezaEmAno('Estupro', 2001));
    }

    public function testeInserirCrime() {
        $object_crime_DAO = new CrimeDAO();
        $object_crime_DAO->__constructTeste();
        $crime_dao_instance->assertObjectHasAttribute('conexao', $object_crime_DAO);
        $crime_dao_instance->assertInstanceOf('CrimeDAO', $object_crime_DAO);
        $object_crime_DAO->inserirCrime(new Crime());
    }

}
