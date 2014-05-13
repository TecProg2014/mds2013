<?php

/*
  File name: EFalhaNaturezaController.php
  File description: exception for kind functions
 */

class EFalhaNaturezaController extends Exception {

//customizing exception to throw a message when exception of fail in controller nature is triggered

    public function __construct() {
        $this->message = "Erro em alguma funcao na classe Natureza";
    }

}
