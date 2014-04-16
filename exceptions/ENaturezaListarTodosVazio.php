<?php

/*
  File name: ENaturezaListarTodosVazio.php
  File description: exception for list kind
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class ENaturezaListarTodosVazio extends Exception {

//customizing exception to throw a message when exception of empty nature is triggered

    public function __construct() {
        $this->message = "Erro ao listar natureza.";
    }

}
