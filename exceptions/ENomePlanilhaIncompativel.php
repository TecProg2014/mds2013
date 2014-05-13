<?php

/*
  File name: ENomePlanilhaIncompativel.php
  File description: exception for parse
 */

class ENomePlanilhaIncompativel extends Exception {

//customizing exception to throw a message when exception of incompatible worksheet is triggered

    public function __construct() {
        $this->message = "Planilha nao compativel com o parse!";
    }

}
