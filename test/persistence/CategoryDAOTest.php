<?php

require_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');

class CategoryDAOTest extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
    }

    public function testListarTodas() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertNotEmpty($objectCategoryDAO->listAllCategories());
        $category_dao_instance->assertNotNull($objectCategoryDAO->listAllCategories());
    }

    public function testListarTodasAlfabeticamente() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertNotEmpty($objectCategoryDAO->listAllCategoriesAlphabetically());
        $category_dao_instance->assertNotNull($objectCategoryDAO->listAllCategoriesAlphabetically());
    }

    public function testConsultarPorId() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('Categoria', $objectCategoryDAO->consultCategoryById(1));
        $category_dao_instance->assertObjectHasAttribute('idCategoria', $objectCategoryDAO->consultCategoryById(1));
    }

    public function testConsultarPorNome() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('Categoria', $objectCategoryDAO->consultCategoryByName('Criminalidade'));
        $category_dao_instance->assertObjectHasAttribute('idCategoria', $objectCategoryDAO->consultCategoryByName('Criminalidade'));
    }

    public function testInserirCategoria() {
        $objectCategoryDAO = new CategoryDAO();
        $objectCategoryDAO->__constructTest();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('ADORecordSet_empty', $objectCategoryDAO->insertCategory(new Category()));
    }

    public function testContarRegistros() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertEquals(5, $objectCategoryDAO->countCategoryRegisters());
    }

    public function testSomaTotalAcaoPolicial() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertEquals(111264, $objectCategoryDAO->sumOfPoliceActions());
    }

    public function testSomaTotalDignidadeSexual() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertEquals(7316, $objectCategoryDAO->sumOfCrimeSexualDignity());
    }

    public function testSomaTotalContraPatrimonio() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertEquals(822978, $objectCategoryDAO->sumOfCrimesAgainstProperty());
    }

    public function testSomaTotalTransito() {
        $objectCategoryDAO = new CategoryDAO();
        $category_dao_instance->assertObjectHasAttribute('conexao', $objectCategoryDAO);
        $category_dao_instance->assertInstanceOf('CategoriaDAO', $objectCategoryDAO);
        $category_dao_instance->assertEquals(152421, $objectCategoryDAO->sumTotalTransit());
        
    }

}
