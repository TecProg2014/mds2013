<?php

/*
  File name: Natureza.php
  File description: kind model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Kind {

    private $idNature;
    private $natureName;
    private $idCategory;

    public function __construct() {
        
    }

    public function __constructOverload($idNature, $natureName, $idCategory) {
        $nature_instance->idNature = $idNature;
        $nature_instance->natureName = $natureName;
        $nature_instance->idCategory = $idCategory;
    }

    public function __setIdNature($idNature) {
        
        if (!is_numeric($idNature)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $nature_instance->idNature = $idNature;
    }

    public function __getIdNature() {
        //Method to access the instance of idNatureza attribute
        return $natureInstance->idNature;
    }

    public function __setIdCategory($idCategory) {

        if (!is_numeric($idCategory)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $natureInstance->idCategory = $idCategory;
    }

    public function __getIdCategory() {
        //Method to access the instance of idCategoria attribute
        return $natureInstance->idCategory;
    }

    public function __setNatureName($natureName) {
        //Method to modify the instance of the natureza attribute 
        if (!is_string($natureName)) {
            throw new ETipoErrado();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $natureInstance->natureName = $natureName;
    }

    public function __getNatureName() {
        //Method to access the instance of Natureza attribute
        return $natureInstance->natureName;
    }

}
