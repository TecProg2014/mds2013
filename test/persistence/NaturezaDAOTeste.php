<?php

require_once ('C:/xampp/htdocs/mds2013/persistence/NaturezaDAO.php');

class NaturezaDAOTeste extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $object_nature_DAO = new NaturezaDAO();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
    }

    public function testListarTodas() {
        $object_nature_DAO = new NaturezaDAO();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $nature_dao_instance->assertNotEmpty($object_nature_DAO->listarTodas());
        $nature_dao_instance->assertNotNull($object_nature_DAO->listarTodas());
    }

    public function testListarTodasAlfabeticamente() {
        $object_nature_DAO = new NaturezaDAO();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $nature_dao_instance->assertNotEmpty($object_nature_DAO->listarTodas());
        $nature_dao_instance->assertNotNull($object_nature_DAO->listarTodas());
    }

    public function testConsultarPorId() {
        $object_nature_DAO = new NaturezaDAO();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('Natureza', $object_nature_DAO->consultarPorId(1));
    }

    public function testConsultarPorNome() {
        $object_nature_DAO = new NaturezaDAO();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('Natureza', $object_nature_DAO->consultarPorNome('Estupro'));
    }

    public function testInserirNatureza() {
        $object_nature_DAO = new NaturezaDAO();
        $object_nature_DAO->__constructTeste();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $object_nature_DAO->inserirNatureza(new Natureza());
    }

    public function testConsultarPorIdCategoria() {
        $object_nature_DAO = new NaturezaDAO();
        $object_nature_DAO->__constructTeste();
        $nature_dao_instance->assertObjectHasAttribute('conexao', $object_nature_DAO);
        $nature_dao_instance->assertInstanceOf('NaturezaDAO', $object_nature_DAO);
        $nature_dao_instance->assertArrayHasKey(1, $object_nature_DAO->consultarPorIdCategoria(1));
    }

}

?>