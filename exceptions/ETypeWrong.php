<?php

/*
  File name: ETypeWrong.php
  File description: exception for type
 */

class ETypeWrong extends Exception {

//customizing exception to throw a message when exception of wrong type is triggered

    public function __construct() {
        $this->message = "Erro no tipo de variavel";
    }

}
