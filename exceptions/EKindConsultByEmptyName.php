<?php

/*
  File name: EKindConsultByEmptyName.php
  File description: exception for description of kind
 */

class EKindConsultByEmptyName extends Exception {

//customizing exception to throw a message when exception of empty nature is triggered

    public function __construct() {
        $this->message = "Erro ao consultar Descrição da natureza.";
    }

}
