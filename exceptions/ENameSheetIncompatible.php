<?php

/*
  File name: ENameSheetIncompatible.php
  File description: exception for parse
 */

class ENameSheetIncompatible extends Exception {

//customizing exception to throw a message when exception of incompatible worksheet is triggered

    public function __construct() {
        $this->message = "Planilha nao compativel com o parse!";
    }

}
