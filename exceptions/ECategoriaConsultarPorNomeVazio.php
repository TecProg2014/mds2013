<?php

/*
  File name: ECategoriaConsultaPorNomeVazio.php
  File description: exception for consult category by name
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class ECategoriaConsultarPorNomeVazio extends Exception {

//customizing exception to throw a message when exception 'consult category by empty name' is triggered

    public function __construct() {
        $this->message = "Erro ao consultar categoria por nome.";
    }

}
