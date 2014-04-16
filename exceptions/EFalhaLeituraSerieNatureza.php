<?php

/*
  File name: EFalhaLeituraSerieNatureza.php
  File description: exception for read kind
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

class EFalhaLeituraSerieNatureza extends Exception {

//customizing exception to throw a message when exception of fail in reading serie nature is triggered

    public function __construct() {
        $this->message = "Falha na leitura de naturezas da planilha serie historica!";
    }

}
