<?php

/*
  File name: Category.php
  File description: category model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Category {

    private $idCategory;
    private $categoryName;

    public function setIdCategory($idCategory) {

        if (!is_numeric($idCategory)) {
            throw new ETipoErrado();
        }
        $this->idCategory = $idCategory;
    }

    public function getIdCategory() {
        //Method to access the instance of idCategory attribute
        return $this->idCategory;
    }

    public function setCategoryName($categoryName) {
        //Method to modify the instance of categoryName attribute

        if (!is_string($categoryName)) {
            throw new ETipoErrado();
        }
        $this->categoryName = $categoryName;
    }

    public function getCategoryName() {
        //Method to access the instance of categoryName attribute
        return $this->categoryName;
    }

    public function constructOverload($idCategory, $categoryName) {

        $this->idCategory = $idCategory;
        $this->categoryName = $categoryName;
    }

    public function construct() {
        
    }

}
