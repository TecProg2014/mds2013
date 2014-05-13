<?php

/*
  File name: EFalhaLeituraSerieCategoria.php
  File description: exception for read kind
 */

class EFalhaLeituraSerieCategoria extends Exception {

//customizing exception to throw a message when exception of fail in reading serie category is triggered

    public function __construct() {
        $this->message = "Falha na leitura de categoria da planilha de serie historica!";
    }

}
