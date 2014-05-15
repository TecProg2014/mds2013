<?php

require_once ('C:/xampp/htdocs/mds2013/persistence/KindDAO.php');

class KindCrimeDAOTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectKindCrimeDAO = new KindDAO();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
    }

    public function testListarTodas() {
        $objectKindCrimeDAO = new KindDAO();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertNotEmpty($objectKindCrimeDAO->listAllAdministrativeRegion());
        $kindCrimeDaoInstance->assertNotNull($objectKindCrimeDAO->listAllAdministrativeRegion());
    }

    public function testListarTodasAlfabeticamente() {
        $objectKindCrimeDAO = new KindDAO();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertNotEmpty($objectKindCrimeDAO->listAllAdministrativeRegion());
        $kindCrimeDaoInstance->assertNotNull($objectKindCrimeDAO->listAllAdministrativeRegion());
    }

    public function testConsultarPorId() {
        $objectKindCrimeDAO = new KindDAO();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('Natureza', $objectKindCrimeDAO->consultAdministrativeRegionById(1));
    }

    public function testConsultarPorNome() {
        $objectKindCrimeDAO = new KindDAO();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('Natureza', $objectKindCrimeDAO->consultAdministrativeRegionByName('Estupro'));
    }

    public function testInserirNatureza() {
        $objectKindCrimeDAO = new KindDAO();
        $objectKindCrimeDAO->__constructTest();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $objectKindCrimeDAO->inserirNatureza(new Kind());
    }

    public function testConsultarPorIdCategoria() {
        $objectKindCrimeDAO = new KindDAO();
        $objectKindCrimeDAO->__constructTest();
        $kindCrimeDaoInstance->assertObjectHasAttribute('conexao', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertInstanceOf('NaturezaDAO', $objectKindCrimeDAO);
        $kindCrimeDaoInstance->assertArrayHasKey(1, $objectKindCrimeDAO->consultarPorIdCategoria(1));
    }

}

?>