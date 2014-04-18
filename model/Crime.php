<?php

/*
  File name: Crime.php
  File description: crime model
 */

include_once('/../exceptions/EFalhaLeituraSerieCrime.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Crime {

    private $idCrime;
    private $crimesQuantity;
    private $idTempo;
    private $idNatureza;
    private $idRA;
    private $exceptionCrime;

    public function __setIdCrime($idCrime) {

        if (!is_numeric($idCrime)) {
            throw new ETipoErrado();
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

    public function __setIdTempo($idTempo) {

        $this->idTempo = $idTempo;
    }

    public function __getIdTempo() {
        //Method to access the instance of tempo attribute
        return $this->idTempo;
    }

    public function __setIdNatureza($idNatureza) {

        $this->idNatureza = $idNatureza;
    }

    public function __getIdNatureza() {
        //Method to access the instance of idNatureza attribute
        return $this->idNatureza;
    }

    public function __setIdRegiaoAdministrativa($idRA) {
        $this->idRA = $idRA;
    }

    public function __getIdRegiaoAdministrativa() {
        //Method to access the instance of IdRegiaoAdministrativa attribute
        return $this->idRA;
    }

    public function __construct() {
        
    }

    public function __constructOverload($idCrime, $idTempo, $idNatureza, $crimesQuantity) {
        $this->idCrime = $idCrime;
        $this->idTempo = $idTempo;
        $this->idNatureza = $idNatureza;
        $this->crimesQuantity = $crimesQuantity;
    }

}
