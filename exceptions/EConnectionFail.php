<?php

/*
  File name: EConnectionFail.php
  File description: exception for database connection
 */

class EConnectionFail extends Exception {

//customizing exception to throw a message when exception of 'fail in connection'is triggered

    public function __construct() {
        $this->message = "Conexao com o Banco Falhou";
    }

}
