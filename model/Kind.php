<?php

/*
  File name: Kind.php
  File description: kind model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETypeWrong.php');

class Kind {

    private $idKindCrime;
    private $kindCrimeName;
    private $idCategory;

    public function __construct() {
        /**
        * constructor
        * 
        * @param    no parameters
        * @return   no returns   
        */
    }

    public function __constructOverload($idKindCrime, $kindCrimeName, $idCategory) {
        /**
        * constructor ovelrload
        * 
        * @param kindCrimeName    name of kind
        * @param idKindCrime      identifier of kind
        * @param idCategory       identifier category
        * @return                 no return   
        */
        $kindCrimeInstance->idKindCrime = $idKindCrime;
        $kindCrimeInstance->kindCrimeName = $kindCrimeName;
        $kindCrimeInstance->idCategory = $idCategory;
    }

    public function __setIdNature($idKindCrime) {
        /**
        * set identifier of kind 
        * 
        * @param idKindCrime      identifier of kind
        * @return                 no return   
        */
        if (!is_numeric($idKindCrime)) {
            throw new ETypeWrong();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->idKindCrime = $idKindCrime;
    }

    public function __getIdNature() {
        /**
        * get identifier of kind 
        * 
        * @param      no parameters
        * @return     identifier of kind 
        */
        return $kindCrimeInstance->idKindCrime;
    }

    public function __setIdCategory($idCategory) {
        /**
        * set identifier of category
        * 
        * @param idCategory       identifier of category
        * @return                 no return   
        */
        if (!is_numeric($idCategory)) {
            throw new ETypeWrong();
            
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->idCategory = $idCategory;
    }

    public function __getIdCategory() {
        /**
        * get identifier of category
        * 
        * @param     no parameters
        * @return    identifier of category
        */
        return $kindCrimeInstance->idCategory;
    }

    public function __setNatureName($kindCrimeName) {
        /**
        * set name of kind 
        * 
        * @param kindCrimeName    name of kind
        * @return                 no return   
        */
        if (!is_string($kindCrimeName)) {
            throw new ETypeWrong();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        $kindCrimeInstance->kindCrimeName = $kindCrimeName;
    }

    public function __getNatureName() {
        /**
        * get name of kind 
        * 
        * @param      no parameters
        * @return     name of kind  
        */
        return $kindCrimeInstance->kindCrimeName;
    }

}
