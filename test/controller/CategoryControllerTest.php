<?php

/*
  File name: CategoryControllerTest.php
  File description: tests the class CategoriaController using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/CategoryController.php');
require_once('C:/xampp/htdocs/mds2013/model/Category.php');

class CategoryControllerTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
    }

    public function testListarTodas() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertNotEmpty($objectCategoryControl->_listarTodas());
    }

    public function testListarTodasAlfabicamente() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertNotEmpty($objectCategoryControl->_listarTodasAlfabicamente());
    }

    public function testConsultarPorId() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('Categoria', $objectCategoryControl->_consultarPorId(1));
    }

    public function testExceptionConsultarPorId() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->setExpectedException('EErroConsulta');
        $objectCategoryControl->_consultarPorId('teste');
    }

    public function testConsultarPorNome() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('Categoria', $objectCategoryControl->_consultarPorNome('Criminalidade'));
    }

    public function testExceptionConsultarPorNome() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->setExpectedException('EErroConsulta');
        $objectCategoryControl->_consultarPorNome(1);
    }

    public function testInserirCategoria() {
        $objectCategoryControl = new CategoryController();
        $objectCategoryControl->__constructTeste();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('ADORecordSet_empty', $objectCategoryControl->_inserirCategoria(new Category()));
    }

    public function testInserirCategoriaArrayParse() {
        $objectCategoryControl = new CategoryController();
        $objectCategoryControl->__constructTeste();
        $arrayCategory[0] = "teste";
        $categoryInstance->assertInstanceOf('ADORecordSet_empty', $objectCategoryControl->_inserirCategoriaArrayParseSerie($arrayCategory));
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
    }

    public function testExceptionInserirCategoriaArrayParse() {
        $objectCategoryControl = new CategoryController();
        $objectCategoryControl->__constructTeste();
        $arrayCategory[0] = "teste";
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->setExpectedException('EErroConsulta');
        $objectCategoryControl->_inserirCategoriaArrayParseSerie(10);
    }

    public function testSomaTotalFurtos() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(1475370, $objectCategoryControl->_somaTotalFurtos());
    }

    public function testSomaTotalAcaoPolicial() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(216513, $objectCategoryControl->_somaGeralCrimeContraPessoa());
    }

    public function testSomaGeralCrimeContraPessoa() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(216513, $objectCategoryControl->_somaGeralCrimeContraPessoa());
    }

    public function testSomaGeralCrimeContraPessoa2010_2011() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(39366, $objectCategoryControl->_somaGeralCrimeContraPessoa2010_2011());
    }

    public function testSomaTotalRoubo() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(938223, $objectCategoryControl->_somaTotalRoubo());
    }

    public function testSomaTotalRoubo2010_2011() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(1876446, $objectCategoryControl->_somaTotalRoubo2010_2011());
    }

    public function testContarRegistros() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals(5, $objectCategoryControl->_contarRegistros());
    }

    public function testListarTotalDeCategoria() {
        $objectCategoryControl = new CategoryController();
        $categoryInstance->assertObjectHasAttribute('categoriaDAO', $objectCategoryControl);
        $categoryInstance->assertInstanceOf('CategoriaController', $objectCategoryControl);
        $categoryInstance->assertEquals("
		var data = [
\t\t{ label: \"Criminalidade\",  data: 1194592},
		{ label: \"A��o Policial\",  data: 111264},
		{ label: \"Tr�nsito\",  data: 97467},
		{ label: \"Contra a Pessoa\",  data: 39206},
		{ label: \"Contra o Patrim�nio\",  data: 69460}
		];", $objectCategoryControl->_listarTotalDeCategoria());
    }

}

?>