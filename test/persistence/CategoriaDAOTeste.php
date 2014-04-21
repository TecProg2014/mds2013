<?php

require_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');

class CategoriaDAOTeste extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
    }

    public function testListarTodas() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertNotEmpty($object_category_DAO->listarTodas());
        $category_dao_instance->assertNotNull($object_category_DAO->listarTodas());
    }

    public function testListarTodasAlfabeticamente() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertNotEmpty($object_category_DAO->listarTodasAlfabicamente());
        $category_dao_instance->assertNotNull($object_category_DAO->listarTodasAlfabicamente());
    }

    public function testConsultarPorId() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('Categoria', $object_category_DAO->consultarPorId(1));
        $category_dao_instance->assertObjectHasAttribute('idCategoria', $object_category_DAO->consultarPorId(1));
    }

    public function testConsultarPorNome() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('Categoria', $object_category_DAO->consultarPorNome('Criminalidade'));
        $category_dao_instance->assertObjectHasAttribute('idCategoria', $object_category_DAO->consultarPorNome('Criminalidade'));
    }

    public function testInserirCategoria() {
        $object_category_DAO = new CategoriaDAO();
        $object_category_DAO->__constructTeste();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('ADORecordSet_empty', $object_category_DAO->inserirCategoria(new Categoria()));
    }

    public function testContarRegistros() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertEquals(5, $object_category_DAO->contarRegistros());
    }

    public function testSomaTotalAcaoPolicial() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertEquals(111264, $object_category_DAO->somaTotalAcaoPolicial());
    }

    public function testSomaTotalDignidadeSexual() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertEquals(7316, $object_category_DAO->somaTotalDignidadeSexual());
    }

    public function testSomaTotalContraPatrimonio() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertEquals(822978, $object_category_DAO->somaTotalContraPatrimonio());
    }

    public function testSomaTotalTransito() {
        $object_category_DAO = new CategoriaDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $object_category_DAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $object_category_DAO);
        $category_dao_instance->assertEquals(152421, $object_category_DAO->somaTotalTransito());
    }

}
