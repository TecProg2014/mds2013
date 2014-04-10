<?php

/*
  File name: Categoria.php
  File description: category model
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Categoria {

    private $idCategoria;
    private $nomeCategoria;

    public function __setIdCategoria($idCategoria) {

        if (!is_numeric($idCategoria)) {
            throw new ETipoErrado();
        }
        $this->idCategoria = $idCategoria;
    }

    public function __getIdCategoria() {
        //Method to access the instance of idCategoria attribute
        return $this->idCategoria;
    }

    public function __setNomeCategoria($nomeCategoria) {
        //Method to modify the instance of nomeCategoria attribute

        if (!is_string($nomeCategoria)) {
            throw new ETipoErrado();
        }
        $this->nomeCategoria = $nomeCategoria;
    }

    public function __getNomeCategoria() {
        //Method to access the instance of nomeCategoria attribute
        return $this->nomeCategoria;
    }

    public function __constructOverload($idCategoria, $nomeCategoria) {

        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
    }

    public function __construct() {
        
    }

}
