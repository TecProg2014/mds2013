<?php

/*
  File name: Tempo.php
  File description: time model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Tempo {

    private $idTempo;
    private $intervalo;
    private $mes;

    public function __setIdTempo($idTempo) {
        //Method to modify the instance of the time attribute 	
        if (!is_numeric($idTempo)) {
            throw new ETipoErrado();
        }
        $this->idTempo = $idTempo;
    }

    public function __getIdTempo() {
        //Method to access the instance of time attribute
        return $this->idTempo;
    }

    public function __setIntervalo($intervalo) {
        //Method to modify the instance of the interval attribute 	
        if (!is_numeric($intervalo)) {
            throw new ETipoErrado();
        }
        $this->intervalo = $intervalo;
    }

    public function __getIntervalo() {
        //Method to access the instance of interval attribute
        return $this->intervalo;
    }

    public function __setMes($mes) {
        //Method to modify the instance of the month attribute 
        $this->mes = $mes;
    }

    public function __getMes() {
        //Method to access the instance of month attribute
        return $this->mes;
    }

    public function __construct() {
        //Default constructor method of class	
    }

    public function __constructOverload($idTempo, $intervalo, $mes) {
        //Constructor method of class	
        $this->idTempo = $idTempo;
        $this->intervalo = $intervalo;
        $this->mes = $mes;
    }

}
