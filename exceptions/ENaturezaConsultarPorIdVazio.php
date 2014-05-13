<?php

/*
  File name: ENaturezaConsultarPorIdVazio.php
  File description: exception for kind id
 */

class ENaturezaConsultarPorIdVazio extends Exception {

//customizing exception to throw a message when exception of consult nature by id is empty is triggered

    public function __construct() {
        $this->message = "Erro ao consultar ID da natureza.";
    }

}
