<?php

/*
  File name: Crime.php
  File description: crime model
 */

include_once('/../exceptions/EFailReadingSerieCrime.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ETypeWrong.php');

class Crime {

    private $idCrime;
    private $crimesQuantity;
    private $idTime;
    private $idKind;
    private $idAdministrativeRegion;
    private $exceptionCrime;

    public function __setIdCrime($idCrime) {

        if (!is_numeric($idCrime)) {
            throw new ETypeWrong();
        }
        $this->idCrime = $idCrime;
    }

    public function __getIdCrime() {
        //Method to access the instance of crime attribute
        return $this->idCrime;
    }

    public function __setcrimesQuantity($crimesQuantity) {

        $this->crimesQuantity = $crimesQuantity;
    }

    public function __getcrimesQuantity() {
        //Method to access the instance of crimesQuantity attribute
        return $this->crimesQuantity;
    }

    public function __setidTime($idTime) {

        $this->idTime = $idTime;
    }

    public function __getidTime() {
        //Method to access the instance of tempo attribute
        return $this->idTime;
    }

    public function __setidKind($idKind) {

        $this->idKind = $idKind;
    }

    public function __getidKind() {
        //Method to access the instance of idKind attribute
        return $this->idKind;
    }

    public function __setIdRegiaoAdministrativa($idAdministrativeRegion) {
        $this->idAdministrativeRegion = $idAdministrativeRegion;
    }

    public function __getIdRegiaoAdministrativa() {
        //Method to access the instance of IdRegiaoAdministrativa attribute
        return $this->idAdministrativeRegion;
    }

    public function __construct() {
        
    }

    public function __constructOverload($idCrime, $idTime, $idKind, $crimesQuantity) {
        $this->idCrime = $idCrime;
        $this->idTime = $idTime;
        $this->idKind = $idKind;
        $this->crimesQuantity = $crimesQuantity;
    }

}
