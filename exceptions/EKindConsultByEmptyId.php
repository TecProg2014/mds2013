<?php

/*
  File name: EKindConsultByEmptyId.php
  File description: exception for kind id
 */

class EKindConsultByEmptyId extends Exception {

//customizing exception to throw a message when exception of consult nature by id is empty is triggered

    public function __construct() {
        $this->message = "Erro ao consultar ID da natureza.";
    }

}
