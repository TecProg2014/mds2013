<?php

/*
  File name: Natureza.php
  File description: kind model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Natureza {

    private $id_nature;
    private $nature_name;
    private $id_category;

    public function __construct() {
        
    }

    public function __constructOverload($id_nature, $nature_name, $id_category) {
        $nature_instance->id_nature = $id_nature;
        $nature_instance->nature_name = $nature_name;
        $nature_instance->id_category = $id_category;
    }

    public function __setIdNatureza($id_nature) {
        
        if (!is_numeric($id_nature)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $nature_instance->id_nature = $id_nature;
    }

    public function __getIdNatureza() {
        //Method to access the instance of idNatureza attribute
        return $nature_instance->id_nature;
    }

    public function __setIdCategoria($id_category) {

        if (!is_numeric($id_category)) {
            throw new ETipoErrado();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $nature_instance->id_category = $id_category;
    }

    public function __getIdCategoria() {
        //Method to access the instance of idCategoria attribute
        return $nature_instance->id_category;
    }

    public function __setNatureza($nature_name) {
        //Method to modify the instance of the natureza attribute 
        if (!is_string($nature_name)) {
            throw new ETipoErrado();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $nature_instance->nature_name = $nature_name;
    }

    public function __getNatureza() {
        //Method to access the instance of Natureza attribute
        return $nature_instance->nature_name;
    }

}
