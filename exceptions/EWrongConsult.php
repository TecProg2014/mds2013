<?php

/*
  File name: EWrongConsult.php
  File description: exception for consult
 */

class EWrongConsult extends Exception {

//customizing exception to throw a message when exception of consult mistake is triggered

    public function __construct() {
        $this->message = "Algo errado em sua consulta";
    }

}
