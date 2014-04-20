<?php

/*
  File name: RegiaoAdministrativa.php
  File description: administrative region model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class RegiaoAdministrativa {

    private $idAdministrativeRegion;
    private $regionName;

    public function __construct() {
        
    }

    public function __constructOverLoad($idAR, $nomeRegiao) {

        $this->idAdministrativeRegion = $idAR;
        $this->regionName = $nomeRegiao;
    }

    public function __setIdRegiaoAdministrativa($idRegiaoAdministrativa) {
        //Method to modify the instance of the regiaoAdministrativa attribute 
        if (!is_numeric($idRegiaoAdministrativa)) {
            throw new ETipoErrado();
        }
        $this->idAdministrativeRegion = $idRegiaoAdministrativa;
    }

    public function __getIdRegiaoAdministrativa() {
        //Method to access the instance of regiaoAdministrativa attribute
        return $this->idAdministrativeRegion;
    }

    public function __setNomeRegiao($nomeRegiao) {
        //Method to modify the instance of the nomeRegiao attribute 

        if (!is_string($nomeRegiao)) {
            throw new ETipoErrado();
        }
        $this->regionName = $nomeRegiao;
    }

    public function __getNomeRegiao() {
        //Method to access the instance of time attribute
        return $this->regionName;
    }

}
