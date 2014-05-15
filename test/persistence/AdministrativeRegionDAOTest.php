<?php

require_once('C:/xampp/htdocs/mds2013/persistence/AdministrativeRegionDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');

class AdministrativeRegionDAOTest extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
    }

    public function testListarTodas() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertNotEmpty($objectRegionAdmDAO->listAllAdministrativeRegion());
        $regionAdmDaoInstance->assertNotNull($objectRegionAdmDAO->listAllAdministrativeRegion());
    }

    public function testListarTodasAlfabeticamente() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertNotEmpty($objectRegionAdmDAO->listAlphabeticallyAllAdministrativeRegions());
        $regionAdmDaoInstance->assertNotNull($objectRegionAdmDAO->listAlphabeticallyAllAdministrativeRegions());
    }

    public function testConsultarPorId() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativa', $objectRegionAdmDAO->consultAdministrativeRegionById(1));
        $regionAdmDaoInstance->assertObjectHasAttribute('idRegiaoAdministrativa', $objectRegionAdmDAO->consultAdministrativeRegionById(1));
    }

    public function testConsultarPorNome() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativa', $objectRegionAdmDAO->consultAdministrativeRegionByName('PLANALTINA'));
        $regionAdmDaoInstance->assertObjectHasAttribute('idRegiaoAdministrativa', $objectRegionAdmDAO->consultAdministrativeRegionByName('PLANALTINA'));
    }

    public function testContarRegistrosRA() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertEquals(32, $objectRegionAdmDAO->_countAdministrativeRegionsRegisters());
    }

    public function testInserirRA() {
        $objectRegionAdmDAO = new AdministrativeRegionDAO();
        $objectRegionAdmDAO->__constructTest();
        $regionAdmDaoInstance->assertObjectHasAttribute('conexao', $objectRegionAdmDAO);
        $regionAdmDaoInstance->assertInstanceOf('RegiaoAdministrativaDAO', $objectRegionAdmDAO);
        $objectRegionAdmDAO->insertAdministrativeRegion(new AdministrativeRegion());
        
    }

}
