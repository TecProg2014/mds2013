<?php

/*
  File name: EFailReadingSerieKind.php
  File description: exception for read kind
 */

class EFailReadingSerieKind extends Exception {

//customizing exception to throw a message when exception of fail in reading serie nature is triggered

    public function __construct() {
        $this->message = "Falha na leitura de naturezas da planilha serie historica!";
    }

}
