<?php

/*
  File name: RegiaoAdministrativa.php
  File description: administrative region model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class AdministrativeRegion{

    private $idAdministrativeRegion;
    private $regionName;

    public function __construct() {
        
    }

    public function __constructOverLoad($idAR, $nomeRegiao) {

        $this->idAdministrativeRegion = $idAR;
        $this->regionName = $nomeRegiao;
    }

    public function __setIdAdministrativeRegion($idAministrativeRegion) {
        //Method to modify the instance of the regiaoAdministrativa attribute 
        if (!is_numeric($idAministrativeRegion)) {
            throw new ETipoErrado();
        }
        $this->idAdministrativeRegion = $idAministrativeRegion;
    }

    public function __getIdAdministrativeRegion() {
        //Method to access the instance of regiaoAdministrativa attribute
        return $this->idAdministrativeRegion;
    }

    public function __setRegionName($regionName) {
        //Method to modify the instance of the nomeRegiao attribute 

        if (!is_string($regionName)) {
            throw new ETipoErrado();
        }
        $this->regionName = $regionName;
    }

    public function __getRegionName() {
        //Method to access the instance of time attribute
        return $this->regionName;
    }

}
