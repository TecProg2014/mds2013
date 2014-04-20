<?php

/*
  File name: CategoriaView.php
  File description: show, consult and sum categories
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/controller/CategoriaController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoriaView {

    private $category_controller;

    public function __construct() {
        $this->category_controller = new CategoriaController();
    }

    public function listarTodas() {
        $array_of_categories = $this->category_controller->_listarTodas();
        if (!is_array($array_of_categories)) {
            throw new EErroConsulta();
        }
        return $array_of_categories;
    }

    public function listarTodasAlfabicamente() {
        $array_of_categories = $this->category_controller->_listarTodasAlfabicamente();
        for ($i = 0, $categories_return = ""; $i < count($array_of_categories); $i++) {
            $category_auxiliar_variable = $array_of_categories[$i];
            $category_name = $category_auxiliar_variable->__getNomeCategoria();
            $id_category = $category_auxiliar_variable->__getIdCategoria();
            $categories_return = $categories_return . "<li><a class=\"submenu\" href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">$category_name</span></a></li>";
        }
        return $categories_return;
    }

    public function listarTodasAlfabeticamentePuro() {
        $array_of_categories = $this->category_controller->_listarTodasAlfabicamente();
        return $array_of_categories;
    }

    public function consultarPorId($id) {
        $category = $this->category_controller->_consultarPorId($id);
        if (get_class($category) != 'Categoria') {
            throw new EErroConsulta();
        }
        return $category;
    }

    public function _consultarPorNome($category_name) {
        $category = $this->category_controller->_consultarPorNome($category_name);
        if (get_class($category) != 'Categoria') {
            throw new EErroConsulta();
        }
        return $category;
    }

    public function contarRegistros() {
        return $this->category_controller->_contarRegistros();
    }

    public function _somaTotalDignidadeSexual() {
        return $this->category_controller->_somaTotalDignidadeSexual();
    }

    public function _somaTotalDignidadeSexual2010_2011() {
        return $this->category_controller->_somaTotalDignidadeSexual2010_2011();
    }

    public function _somaTotalAcaoPolicial() {
        return $this->category_controller->_somaTotalAcaoPolicial();
    }

    public function _somaTotalAcaoPolicial2010_2011() {
        return $this->category_controller->_somaTotalAcaoPolicial2010_2011();
    }

    public function _somaGeralCrimeContraPessoa() {
        return $this->category_controller->_somaGeralCrimeContraPessoa();
    }

    public function _somaGeralCrimeContraPessoa2010_2011() {
        return $this->category_controller->_somaGeralCrimeContraPessoa2010_2011();
    }

    public function _somaTotalRoubo() {
        return $this->category_controller->_somaTotalRoubo();
    }

    public function _somaTotalRoubo2010_2011() {
        return $this->category_controller->_somaTotalRoubo2010_2011();
    }

    public function _somaTotalFurtos() {
        return $this->category_controller->_somaTotalFurtos();
    }

    public function _listarTotalDeCategoria() {
        return $this->category_controller->_listarTotalDeCategoria();
    }

}
