<?php

/*
  File name: AdministrativeRegion.php
  File description: administrative region model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETypeWrong.php');

class AdministrativeRegion{

    private $idAdministrativeRegion;
    private $regionName;

    public function construct() {
        
    }

    public function constructOverLoad($idAR, $nomeRegiao) {

        $this->idAdministrativeRegion = $idAR;
        $this->regionName = $nomeRegiao;
    }

    public function setIdAdministrativeRegion($idAministrativeRegion) {
        //Method to modify the instance of the regiaoAdministrativa attribute 
        if (!is_numeric($idAministrativeRegion)) {
            throw new ETypeWrong();
        }
        $this->idAdministrativeRegion = $idAministrativeRegion;
    }

    public function getIdAdministrativeRegion() {
        //Method to access the instance of regiaoAdministrativa attribute
        return $this->idAdministrativeRegion;
    }

    public function setRegionName($regionName) {
        //Method to modify the instance of the nomeRegiao attribute 

        if (!is_string($regionName)) {
            throw new ETypeWrong();
        }
        $this->regionName = $regionName;
    }

    public function getRegionName() {
        //Method to access the instance of time attribute
        return $this->regionName;
    }

}
