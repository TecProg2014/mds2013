<?php

/*
  File name: EKindListAllAlphabeticalEmpty.php
  File description: exception for list alphabetical
 */

class EKindListAllAlphabeticalEmpty extends Exception {

//customizing exception to throw a message when exception of empty alphabetical nature is triggered

    public function __construct() {
        $this->message = "Ocorreu um problema ao tentar organizar natureza alfabeticamente.";
    }

}
