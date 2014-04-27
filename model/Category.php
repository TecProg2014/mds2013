<?php

/*
  File name: Categoria.php
  File description: category model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Category {

    private $id_category;
    private $category_name;

    public function __setIdCategory($idCategory) {

        if (!is_numeric($idCategory)) {
            throw new ETipoErrado();
        }
        $this->id_category = $idCategory;
    }

    public function __getIdCategory() {
        //Method to access the instance of id_category attribute
        return $this->id_category;
    }

    public function __setCategoryName($categoryName) {
        //Method to modify the instance of category_name attribute

        if (!is_string($categoryName)) {
            throw new ETipoErrado();
        }
        $this->category_name = $categoryName;
    }

    public function __getCategoryName() {
        //Method to access the instance of category_name attribute
        return $this->category_name;
    }

    public function __constructOverload($idCategory, $category_name) {

        $this->id_category = $idCategory;
        $this->category_name = $category_name;
    }

    public function __construct() {
        
    }

}
