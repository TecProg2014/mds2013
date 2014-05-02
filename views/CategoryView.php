<?php

/*
  File name: CategoriaView.php
  File description: show, consult and sum categories
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/controller/CategoryController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoryView {

    private $category_controller;

    public function __construct() {
        $this->category_controller = new CategoriaController();
    }

    public function listAllCategories() {
        $arrayOfCategories = $this->category_controller->_listarTodas();
        if (!is_array($arrayOfCategories)) {
            throw new EErroConsulta();
        }
        return $arrayOfCategories;
    }

    public function listAllAlphabetically() {
        $arrayOfCategories = $this->category_controller->_listarTodasAlfabicamente();
        for ($i = 0, $categories_return = ""; $i < count($arrayOfCategories); $i++) {
            $category_auxiliar_variable = $arrayOfCategories[$i];
            $category_name = $category_auxiliar_variable->__getCategoryName();
            $id_category = $category_auxiliar_variable->__getIdCategory();
            $categories_return = $categories_return . "<li><a class=\"submenu\" href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">$category_name</span></a></li>";
        }
        return $categories_return;
    }

    public function listAllAlphabeticallyPure() {
        $arrayOfCategories = $this->category_controller->_listarTodasAlfabicamente();
        return $arrayOfCategories;
    }

    public function consultCategoryById($id) {
        $category = $this->category_controller->_consultarPorId($id);
        if (get_class($category) != 'Categoria') {
            throw new EErroConsulta();
        }
        return $category;
    }

    public function _consultByName($category_name) {
        $category = $this->category_controller->_consultarPorNome($category_name);
        if (get_class($category) != 'Categoria') {
            throw new EErroConsulta();
        }
        return $category;
    }

    public function countCategoryRegisters() {
        return $this->category_controller->_contarRegistros();
    }

    public function _sumTotalSexualDignity() {
        return $this->category_controller->_somaTotalDignidadeSexual();
    }

    public function _sumTotalSexualDignity2010_2011() {
        return $this->category_controller->_somaTotalDignidadeSexual2010_2011();
    }

    public function _sumOfPoliceActions() {
        return $this->category_controller->_somaTotalAcaoPolicial();
    }

    public function _sumOfPoliceActions2010_2011() {
        return $this->category_controller->_sumOfPoliceActions2010_2011();
    }

    public function _sumOfCrimesAgainstPerson() {
        return $this->category_controller->_somaGeralCrimeContraPessoa();
    }

    public function _sumOfCrimesAgainstPerson2010_2011() {
        return $this->category_controller->_somaGeralCrimeContraPessoa2010_2011();
    }

    public function _sumOfSteals() {
        return $this->category_controller->_somaTotalRoubo();
    }

    public function _sumOfSteals2010_2011() {
        return $this->category_controller->_somaTotalRoubo2010_2011();
    }

    public function _sumOfThefts() {
        return $this->category_controller->_somaTotalFurtos();
    }

    public function _listTotalOfCategories() {
        return $this->category_controller->_listarTotalDeCategoria();
    }

}
