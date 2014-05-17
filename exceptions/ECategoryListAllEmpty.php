<?php

/*
  File name: ECategoryListAllEmpty.php
  File description: exception for list categories
 */

class ECategoryListAllEmpty extends Exception {

//customizing exception to throw a message when exception of 'empty list category' is triggered

    public function __construct() {
        $this->message = "Erro ao listar categorias.";
    }

}
