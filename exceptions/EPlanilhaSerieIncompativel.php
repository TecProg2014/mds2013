<?php

/*
  File name: EPlanilhaSerieIncompativel.php
  File description: exception for series
 */

class EPlanilhaSerieIncompativel extends Exception {

//customizing exception to throw a message when exception of incompatible series is triggered

    public function __construct() {
        $this->message = "Esta planilha n�o e de serie historica!";
    }

}
