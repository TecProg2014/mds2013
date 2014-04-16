<?php

/*
  File name: ECategoriaListarConsultaPorIdVazio.php
  File description: exception for id
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class ECategoriaListarConsultaPorIdVazio extends Exception {

//customizing exception to throw a message when exception 'list category by empty id' is triggered

    public function __construct() {
        $this->message = "ID nao encontrado.";
    }

}
