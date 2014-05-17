<?php

/*
  File name: ECrimeConsultByEmptyId.php
  File description: exception for consult crime id
 */

class ECrimeConsultByEmptyId extends Exception {

//customizing exception to throw a message when exception of consulting crime by empty id is triggered

    public function __construct() {
        $this->message = "Problema ao consultar ID de crime.";
    }

}
