<?php

/*
  File name: RegiaoAdministrativaDAO.php
  File description: persistence administrative region on database
 */
include_once('C:/xampp/htdocs/mds2013/model/AdministrativeRegion.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TestConnection.php');

class AdministrativeRegionDAO {

    private $conexion;

    public function construct() {
        $this->conexion = new Connection();
    }

    public function constructTest() {
        $this->conexion = new TestConnection();
    }

    public function listAllAdministrativeRegion() {
        $sql = "SELECT * FROM regiao_administrativa";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        while ($register = $database_conexion_result->FetchNextObject()) {
            $administrative_region_data = new AdministrativeRegion();
            $administrative_region_data-> constructOverload($register->ID_REGIAO_ADMINISTRATIVA, $register->NOME);
            $array_of_administrative_regions[] = $administrative_region_data;
        }
        return $array_of_administrative_regions;
    }

    public function listAlphabeticallyAllAdministrativeRegions() {
        $sql = "SELECT * FROM regiao_administrativa ORDER BY nome ASC";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        while ($register = $database_conexion_result->FetchNextObject()) {
            $administrative_region_data = new AdministrativeRegion();
            $administrative_region_data-> constructOverload($register->ID_REGIAO_ADMINISTRATIVA, $register->NOME);
            $array_of_administrative_regions[] = $administrative_region_data;
        }
        return $array_of_administrative_regions;
    }

    public function consultAdministrativeRegionById($id) {
        $sql = "SELECT * FROM regiao_administrativa WHERE id_regiao_administrativa ='" . $id . "'";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        $administrative_region_data = new AdministrativeRegion();
        $administrative_region_data-> constructOverload($register->ID_REGIAO_ADMINISTRATIVA, $register->NOME);
        return $administrative_region_data;
    }

    public function consultAdministrativeRegionByName($nome) {
        $sql = "SELECT * FROM regiao_administrativa WHERE nome = '" . $nome . "'";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        $administrative_region_data = new AdministrativeRegion();
        $administrative_region_data->__constructOverload($register->ID_REGIAO_ADMINISTRATIVA, $register->NOME);
        return $administrative_region_data;
    }

    public function countAdministrativeRegionsRegisters() {
        $sql = "SELECT COUNT(id_regiao_administrativa)AS total FROM regiao_administrativa";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function insertAdministrativeRegion(AdministrativeRegion $RA) {
        $sql = "INSERT INTO regiao_administrativa (nome) values ('{$RA-> getRegionName()}')";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        return $database_conexion_result;
    }

}
