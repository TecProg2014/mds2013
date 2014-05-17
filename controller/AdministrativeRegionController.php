<?php

/*
  File name: AdministrativeRegion.php
  File description: insert, consult, show and sum some administrative region informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/AdministrativeRegionDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EWrongConsult.php');
include_once('C:/xampp/htdocs/mds2013/model/AdministrativeRegion.php');

class AdministrativeRegionController {

    private $administrativeRegionDAO;

    public function __construct() {
        $this->administrativeRegionDAO = new AdministrativeRegionDAO();
    }

    public function listAllAdministrativeRegions() {
        //lists administrative regions
        $arrayOfAdministrativeRegions = $this->administrativeRegionDAO->listAllAdministrativeRegion();
        return $arrayOfAdministrativeRegions;
    }

    public function __constructTest() {
        //tests instance raDAO
        $this->administrativeRegionDAO->__constructTest();
    }

    public function listAllAdministrativeRegionsAlphabetically() {
        //lists administrative regions alphabetically

        $arrayOfAdministrativeRegions = $this->administrativeRegionDAO->listAllAdministrativeRegionsAlphabetically();

        //loop for order administrative regions alphabetically
        for ($i = 0; $i < (count($arrayOfAdministrativeRegions)); $i++) {
            $AdministrativeRegionName[] = $arrayOfAdministrativeRegions[$i]->__getRegionName();
        }
        return $AdministrativeRegionName;
    }

    public function consultAdministrativeRegionById($id) {
        //consults administrative region by its id

        if (!is_numeric($id)) {
            throw new EWrongConsult();
        }

        $AdministrativeRegion = $this->administrativeRegionDAO->consultAdministrativeRegionById($id);
        return $AdministrativeRegion;
    }

    public function consultAdministrativeRegionByName($AdministrativeRegionName) {
        //consults administrative regions by their names

        if (!is_string($AdministrativeRegionName)) {
            throw new EWrongConsult();
        }
        $AR = $this->administrativeRegionDAO->consultAdministrativeRegionByName($AdministrativeRegionName);
        return $AR;
    }

    public function countAdministrativeRegionsRegisters() {
        //counts administrative regions' records
        return $this->administrativeRegionDAO-> countAdministrativeRegionsRegisters();
    }

    public function insertAdministrativeRegion(AdministrativeRegion $RA) {
        //inserts administrative regions
        return $this->administrativeRegionDAO->insertAdministrativeRegion($RA);
    }

    public function insertAdministrativeRegionArrayParse($arrayOfAdministrativeRegions) {
        for ($i = 0; $i < count($arrayOfAdministrativeRegions); $i++) {
            $regionData = new AdministrativeRegion();
            $regionData-> setRegionName($arrayOfAdministrativeRegions[$i]);
            $this->administrativeRegionDAO->insertAdministrativeRegion($regionData);
        }
    }

}
