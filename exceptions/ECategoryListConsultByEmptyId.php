<?php

/*
  File name: ECategoryListConsultByEmptyId.php
  File description: exception for id
 */

class ECategoryListConsultByEmptyId extends Exception {

//customizing exception to throw a message when exception 'list category by empty id' is triggered

    public function __construct() {
        $this->message = "ID nao encontrado.";
    }

}
