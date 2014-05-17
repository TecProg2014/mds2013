<?php

/*
  File name: ECategoryListAllAlphabeticalEmpty.php
  File description: exception for list categories alphabetical
 */

class ECategoryListAllAlphabeticalEmpty extends Exception {

//customizing exception to throw a message when exception of 'list all categories is empty' is triggered

    public function __construct() {
        $this->message = "Problema ao listar categorias alfabeticamente.";
    }

}
