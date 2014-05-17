<?php

/*
  File name: EFailKindController.php
  File description: exception for kind functions
 */

class EFailKindController extends Exception {

//customizing exception to throw a message when exception of fail in controller nature is triggered

    public function __construct() {
        $this->message = "Erro em alguma funcao na classe Natureza";
    }

}
