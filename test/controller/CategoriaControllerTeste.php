<?php

/*
  File name: CategoriaControllerTeste.php
  File description: tests the class CategoriaController using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/CategoriaController.php');
require_once('C:/xampp/htdocs/mds2013/model/Categoria.php');

class CategoriaControllerTeste extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
    }

    public function testListarTodas() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertNotEmpty($object_category_control->_listarTodas());
    }

    public function testListarTodasAlfabicamente() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertNotEmpty($object_category_control->_listarTodasAlfabicamente());
    }

    public function testConsultarPorId() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertInstanceOf('Categoria', $object_category_control->_consultarPorId(1));
    }

    public function testExceptionConsultarPorId() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->setExpectedException('EErroConsulta');
        $object_category_control->_consultarPorId('teste');
    }

    public function testConsultarPorNome() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertInstanceOf('Categoria', $object_category_control->_consultarPorNome('Criminalidade'));
    }

    public function testExceptionConsultarPorNome() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->setExpectedException('EErroConsulta');
        $object_category_control->_consultarPorNome(1);
    }

    public function testInserirCategoria() {
        $object_category_control = new CategoriaController();
        $object_category_control->__constructTeste();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertInstanceOf('ADORecordSet_empty', $object_category_control->_inserirCategoria(new Category()));
    }

    public function testInserirCategoriaArrayParse() {
        $object_category_control = new CategoriaController();
        $object_category_control->__constructTeste();
        $arrayCategoria[0] = "teste";
        $category_instance->assertInstanceOf('ADORecordSet_empty', $object_category_control->_inserirCategoriaArrayParseSerie($arrayCategoria));
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
    }

    public function testExceptionInserirCategoriaArrayParse() {
        $object_category_control = new CategoriaController();
        $object_category_control->__constructTeste();
        $array_category[0] = "teste";
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->setExpectedException('EErroConsulta');
        $object_category_control->_inserirCategoriaArrayParseSerie(10);
    }

    public function testSomaTotalFurtos() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(1475370, $object_category_control->_somaTotalFurtos());
    }

    public function testSomaTotalAcaoPolicial() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(216513, $object_category_control->_somaGeralCrimeContraPessoa());
    }

    public function testSomaGeralCrimeContraPessoa() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(216513, $object_category_control->_somaGeralCrimeContraPessoa());
    }

    public function testSomaGeralCrimeContraPessoa2010_2011() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(39366, $object_category_control->_somaGeralCrimeContraPessoa2010_2011());
    }

    public function testSomaTotalRoubo() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(938223, $object_category_control->_somaTotalRoubo());
    }

    public function testSomaTotalRoubo2010_2011() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(1876446, $object_category_control->_somaTotalRoubo2010_2011());
    }

    public function testContarRegistros() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals(5, $object_category_control->_contarRegistros());
    }

    public function testListarTotalDeCategoria() {
        $object_category_control = new CategoriaController();
        $category_instance->assertObjectHasAttribute('categoriaDAO', $object_category_control);
        $category_instance->assertInstanceOf('CategoriaController', $object_category_control);
        $category_instance->assertEquals("
		var data = [
\t\t{ label: \"Criminalidade\",  data: 1194592},
		{ label: \"A��o Policial\",  data: 111264},
		{ label: \"Tr�nsito\",  data: 97467},
		{ label: \"Contra a Pessoa\",  data: 39206},
		{ label: \"Contra o Patrim�nio\",  data: 69460}
		];", $object_category_control->_listarTotalDeCategoria());
    }

}

?>