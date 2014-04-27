<?php

/*
  File name: RegiaoAdministrativaView.php
  File description: show administrative region
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/controller/RegiaoAdministrativaController.php');

class RegiaoAdministrativaView {

    private $raCO;

    public function __construct() {
        $this->raCO = new RegiaoAdministrativaController();
    }

    public function listarTodasAlfabeticamente() {
        $administrativeRegionName = $this->raCO->__listAlphabeticallyAllAdministrativeRegions();
        for ($i = 0, $returnAdministrativeRegion = ""; $i < count($administrativeRegionName); $i++) {
            $returnAdministrativeRegion = $returnAdministrativeRegion . "<li><a class=\"submenu\" href=\"?pag=u\"><i class=\"icon-map-marker\"></i><span class=\"hidden-tablet\">" . $administrativeRegionName[$i] . "</span></a></li>";
        }
        return $returnAdministrativeRegion;
    }

    public function contarRegistrosRA() {
        return $this->raCO->_countAdministrativeRegionsRegisters();
    }

}
