<?php

/*
  File name: ECategoriaListarTodasVazio.php
  File description: exception for list categories
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class ECategoriaListarTodasVazio extends Exception {

//customizing exception to throw a message when exception of 'empty list category' is triggered

    public function __construct() {
        $this->message = "Erro ao listar categorias.";
    }

}
