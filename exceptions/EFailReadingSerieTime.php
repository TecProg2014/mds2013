<?php

/*
  File name: EFailReadingSerieTime.php
  File description: exception for read time
 */

class EFailReadingSerieTime extends Exception {

//customizing exception to throw a message when exception of fail in reading serie and time is triggered

    public function __construct() {
        $this->message = "Falha na leitura de tempo da planilha serie historica!";
    }

}
