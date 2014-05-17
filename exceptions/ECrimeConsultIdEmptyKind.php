<?php

/*
  File name: ECrimeConsultIdEmptyKind.php
  File description: exception for consult crime id
 */

class ECrimeConsultIdEmptyKind extends Exception {

//customizing exception to throw a message when exception 'consulting id and nature is empty' is triggered

    public function __construct() {
        $this->message = "Erro ao consultar o ID da natureza.";
    }

}
