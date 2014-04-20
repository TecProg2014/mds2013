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

    public function _listarTodas() {
        //lists administrative regions
        $arrayOfAdministrativeRegions = $this->administrativeRegionDAO->listarTodas();
        return $arrayOfAdministrativeRegions;
    }

    public function __constructTeste() {
        //tests instance raDAO
        $this->administrativeRegionDAO->__constructTeste();
    }

    public function _listarTodasAlfabeticamente() {
        //lists administrative regions alphabetically

        $arrayRA = $this->administrativeRegionDAO->listarTodasAlfabeticamente();

        //loop for order administrative regions alphabetically
        for ($i = 0; $i < (count($arrayRA)); $i++) {
            $nomeRA[] = $arrayRA[$i]->__getNomeRegiao();
        }
        return $nomeRA;
    }

    public function _consultarPorId($id) {
        //consults administrative region by its id

        if (!is_numeric($id)) {
            throw new EErroConsulta();
        }

        $RA = $this->administrativeRegionDAO->consultarPorId($id);
        return $RA;
    }

    public function _consultarPorNome($nome) {
        //consults administrative regions by their names

        if (!is_string($nome)) {
            throw new EErroConsulta();
        }
        $RA = $this->administrativeRegionDAO->consultarPorNome($nome);
        return $RA;
    }

    public function _contarRegistrosRA() {
        //counts administrative regions' records
        return $this->administrativeRegionDAO->contarRegistrosRA();
    }

    public function _inserirRA(RegiaoAdministrativa $RA) {
        //inserts administrative regions
        return $this->administrativeRegionDAO->inserirRA($RA);
    }

    public function _inserirRegiaoArrayParseRA($arrayRA) {
        for ($i = 0; $i < count($arrayRA); $i++) {
            $dadosRegiao = new RegiaoAdministrativa();
            $dadosRegiao->__setNomeRegiao($arrayRA[$i]);
            $this->administrativeRegionDAO->inserirRA($dadosRegiao);
        }
    }

}
