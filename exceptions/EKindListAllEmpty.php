<?php

/*
  File name: EKindListAllEmpty.php
  File description: exception for list kind
 */

class EKindListAllEmpty extends Exception {

//customizing exception to throw a message when exception of empty nature is triggered

    public function __construct() {
        $this->message = "Erro ao listar natureza.";
    }

}
