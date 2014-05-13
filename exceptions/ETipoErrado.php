<?php

/*
  File name: ETipoErrado.php
  File description: exception for type
 */

class ETipoErrado extends Exception {

//customizing exception to throw a message when exception of wrong type is triggered

    public function __construct() {
        $this->message = "Erro no tipo de variavel";
    }

}
