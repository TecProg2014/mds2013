<?php

/*
  File name: EFalhaLeituraSerieTempo.php
  File description: exception for read time
 */

class EFalhaLeituraSerieTempo extends Exception {

//customizing exception to throw a message when exception of fail in reading serie and time is triggered

    public function __construct() {
        $this->message = "Falha na leitura de tempo da planilha serie historica!";
    }

}
