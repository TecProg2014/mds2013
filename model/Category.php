<?php

/*
  File name: Categoria.php
  File description: category model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Categoria {

    private $id_category;
    private $category_name;

    public function __setIdCategoria($idCategoria) {

        if (!is_numeric($idCategoria)) {
            throw new ETipoErrado();
        }
        $this->id_category = $idCategoria;
    }

    public function __getIdCategoria() {
        //Method to access the instance of id_category attribute
        return $this->id_category;
    }

    public function __setNomeCategoria($category_name) {
        //Method to modify the instance of category_name attribute

        if (!is_string($category_name)) {
            throw new ETipoErrado();
        }
        $this->category_name = $category_name;
    }

    public function __getNomeCategoria() {
        //Method to access the instance of category_name attribute
        return $this->category_name;
    }

    public function __constructOverload($id_category, $category_name) {

        $this->id_category = $id_category;
        $this->category_name = $category_name;
    }

    public function __construct() {
        
    }

}
