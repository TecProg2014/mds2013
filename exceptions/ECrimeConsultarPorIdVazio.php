<?php

/*
  File name: ECrimeConsultarPorIdVazio.php
  File description: exception for consult crime id
 */

class ECrimeConsultarPorIdVazio extends Exception {

//customizing exception to throw a message when exception of consulting crime by empty id is triggered

    public function __construct() {
        $this->message = "Problema ao consultar ID de crime.";
    }

}
