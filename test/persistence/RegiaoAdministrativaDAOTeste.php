<?php

require_once('C:/xampp/htdocs/mds2013/persistence/RegiaoAdministrativaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');

class RegiaoAdministrativaDAOTeste extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
    }

    public function testListarTodas() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertNotEmpty($object_region_adm_DAO->listAllAdministrativeRegion());
        $region_adm_dao_instance->assertNotNull($object_region_adm_DAO->listAllAdministrativeRegion());
    }

    public function testListarTodasAlfabeticamente() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertNotEmpty($object_region_adm_DAO->listAlphabeticallyAllAdministrativeRegions());
        $region_adm_dao_instance->assertNotNull($object_region_adm_DAO->listAlphabeticallyAllAdministrativeRegions());
    }

    public function testConsultarPorId() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_DAO->consultAdministrativeRegionById(1));
        $region_adm_dao_instance->assertObjectHasAttribute('idRegiaoAdministrativa', $object_region_adm_DAO->consultAdministrativeRegionById(1));
    }

    public function testConsultarPorNome() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_DAO->consultAdministrativeRegionByName('PLANALTINA'));
        $region_adm_dao_instance->assertObjectHasAttribute('idRegiaoAdministrativa', $object_region_adm_DAO->consultAdministrativeRegionByName('PLANALTINA'));
    }

    public function testContarRegistrosRA() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertEquals(32, $object_region_adm_DAO->_countAdministrativeRegionsRegisters());
    }

    public function testInserirRA() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $object_region_adm_DAO->__constructTest();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $object_region_adm_DAO->insertAdministrativeRegion(new AdministrativeRegion());
    }

}
