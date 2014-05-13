<?php

/*
  File name: EcrimeListarTodosVazio.php
  File description: exception for list crime
 */

class EcrimeListarTodosVazio extends Exception {

//customizing exception to throw a message when exception of empty crimes is triggered

    public function __construct() {
        $this->message = "Problema ao listar crimes.";
    }

}
