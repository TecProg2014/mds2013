<?php

/*
  File name: ENaturezaConsultarPorNomeVazio.php
  File description: exception for description of kind
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class ENaturezaConsultarPorNomeVazio extends Exception {

//customizing exception to throw a message when exception of empty nature is triggered

    public function __construct() {
        $this->message = "Erro ao consultar Descrição da natureza.";
    }

}
