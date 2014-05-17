<?php

/*
  File name: Kind.php
  File description: kind model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Kind {

    private $idKindCrime;
    private $kindCrimeName;
    private $idCategory;

    public function __construct() {
        
    }

    public function __constructOverload($idKindCrime, $kindCrimeName, $idCategory) {
        $kindCrimeInstance->idKindCrime = $idKindCrime;
        $kindCrimeInstance->kindCrimeName = $kindCrimeName;
        $kindCrimeInstance->idCategory = $idCategory;
    }

    public function __setIdNature($idKindCrime) {
        
        if (!is_numeric($idKindCrime)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->idKindCrime = $idKindCrime;
    }

    public function __getIdNature() {
        //Method to access the instance of idNatureza attribute
        return $kindCrimeInstance->idKindCrime;
    }

    public function __setIdCategory($idCategory) {

        if (!is_numeric($idCategory)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->idCategory = $idCategory;
    }

    public function __getIdCategory() {
        //Method to access the instance of idCategoria attribute
        return $kindCrimeInstance->idCategory;
    }

    public function __setNatureName($kindCrimeName) {
        //Method to modify the instance of the natureza attribute 
        if (!is_string($kindCrimeName)) {
            throw new ETipoErrado();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->kindCrimeName = $kindCrimeName;
    }

    public function __getNatureName() {
        //Method to access the instance of Natureza attribute
        return $kindCrimeInstance->kindCrimeName;
    }

}
