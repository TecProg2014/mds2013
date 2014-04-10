<?php

/*
  File name: RegiaoAdministrativa.php
  File description: administrative region model
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class RegiaoAdministrativa {

    private $idRegiaoAdministrativa;
    private $nomeRegiao;

    public function __construct() {
        
    }

    public function __constructOverLoad($idRA, $nomeRegiao) {

        $this->idRegiaoAdministrativa = $idRA;
        $this->nomeRegiao = $nomeRegiao;
    }

    public function __setIdRegiaoAdministrativa($idRegiaoAdministrativa) {
        //Method to modify the instance of the regiaoAdministrativa attribute 
        if (!is_numeric($idRegiaoAdministrativa)) {
            throw new ETipoErrado();
        }
        $this->idRegiaoAdministrativa = $idRegiaoAdministrativa;
    }

    public function __getIdRegiaoAdministrativa() {
        //Method to access the instance of regiaoAdministrativa attribute
        return $this->idRegiaoAdministrativa;
    }

    public function __setNomeRegiao($nomeRegiao) {
        //Method to modify the instance of the nomeRegiao attribute 

        if (!is_string($nomeRegiao)) {
            throw new ETipoErrado();
        }
        $this->nomeRegiao = $nomeRegiao;
    }

    public function __getNomeRegiao() {
        //Method to access the instance of time attribute
        return $this->nomeRegiao;
    }

}
