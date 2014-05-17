<?php

/*
  File name: EFailCrimeController.php
  File description: exception for crime controller function
 */

class EFailCrimeController extends Exception {

//customizing exception to throw a message when exception in crime controlles is triggered

    public function __construct() {
        $this->message = "Problema em alguma funcao de crime controller";
    }

}
