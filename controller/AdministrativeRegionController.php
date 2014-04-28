<?php

/*
  File name: RegiaoAdministrativaController.php
  File description: insert, consult, show and sum some administrative region informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/RegiaoAdministrativaDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');
include_once('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');

class RegiaoAdministrativaController {

    private $administrativeRegionDAO;

    public function __construct() {
        $this->administrativeRegionDAO = new RegiaoAdministrativaDAO();
    }

    public function _listAllAdministrativeRegions() {
        //lists administrative regions
        $arrayOfAdministrativeRegions = $this->administrativeRegionDAO->listAllAdministrativeRegion();
        return $arrayOfAdministrativeRegions;
    }

    public function __constructTest() {
        //tests instance raDAO
        $this->administrativeRegionDAO->__constructTest();
    }

    public function __listAlphabeticallyAllAdministrativeRegions() {
        //lists administrative regions alphabetically

        $arrayOfAdministrativeRegions = $this->administrativeRegionDAO->listAlphabeticallyAllAdministrativeRegions();

        //loop for order administrative regions alphabetically
        for ($i = 0; $i < (count($arrayOfAdministrativeRegions)); $i++) {
            $AdministrativeRegionName[] = $arrayOfAdministrativeRegions[$i]->__getRegionName();
        }
        return $AdministrativeRegionName;
    }

    public function _consultAdministrativeRegionById($id) {
        //consults administrative region by its id

        if (!is_numeric($id)) {
            throw new EErroConsulta();
        }

        $AdministrativeRegion = $this->administrativeRegionDAO->consultAdministrativeRegionById($id);
        return $AdministrativeRegion;
    }

    public function _consultAdministrativeRegionByName($AdministrativeRegionName) {
        //consults administrative regions by their names

        if (!is_string($AdministrativeRegionName)) {
            throw new EErroConsulta();
        }
        $AR = $this->administrativeRegionDAO->consultAdministrativeRegionByName($AdministrativeRegionName);
        return $AR;
    }

    public function _countAdministrativeRegionsRegisters() {
        //counts administrative regions' records
        return $this->administrativeRegionDAO->_countAdministrativeRegionsRegisters();
    }

    public function insertAdministrativeRegion(AdministrativeRegion $RA) {
        //inserts administrative regions
        return $this->administrativeRegionDAO->insertAdministrativeRegion($RA);
    }

    public function _insertAdministrativeRegionArrayParse($arrayOfAdministrativeRegions) {
        for ($i = 0; $i < count($arrayOfAdministrativeRegions); $i++) {
            $regionData = new AdministrativeRegion();
            $regionData->__setRegionName($arrayOfAdministrativeRegions[$i]);
            $this->administrativeRegionDAO->insertAdministrativeRegion($regionData);
        }
    }

}
