<?php

/*
  File name: EFailReadingSerieCrime.php
  File description: exception for read crime
 */

class EFailReadingSerieCrime extends Exception {

//customizing exception to throw a message when exception of fail in reading serie crime is triggered

    public function __construct() {
        $this->message = "Falha na leitura de crime da planilha serie historica!";
    }

}
