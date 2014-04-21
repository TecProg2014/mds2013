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
        $region_adm_dao_instance->assertNotEmpty($object_region_adm_DAO->listarTodas());
        $region_adm_dao_instance->assertNotNull($object_region_adm_DAO->listarTodas());
    }

    public function testListarTodasAlfabeticamente() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertNotEmpty($object_region_adm_DAO->listarTodasAlfabeticamente());
        $region_adm_dao_instance->assertNotNull($object_region_adm_DAO->listarTodasAlfabeticamente());
    }

    public function testConsultarPorId() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_DAO->consultarPorId(1));
        $region_adm_dao_instance->assertObjectHasAttribute('idRegiaoAdministrativa', $object_region_adm_DAO->consultarPorId(1));
    }

    public function testConsultarPorNome() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_DAO->consultarPorNome('PLANALTINA'));
        $region_adm_dao_instance->assertObjectHasAttribute('idRegiaoAdministrativa', $object_region_adm_DAO->consultarPorNome('PLANALTINA'));
    }

    public function testContarRegistrosRA() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $region_adm_dao_instance->assertEquals(32, $object_region_adm_DAO->contarRegistrosRA());
    }

    public function testInserirRA() {
        $object_region_adm_DAO = new RegiaoAdministrativaDAO();
        $object_region_adm_DAO->__constructTeste();
        $region_adm_dao_instance->assertObjectHasAttribute('conexao', $object_region_adm_DAO);
        $region_adm_dao_instance->assertInstanceOf('RegiaoAdministrativaDAO', $object_region_adm_DAO);
        $object_region_adm_DAO->inserirRA(new RegiaoAdministrativa());
    }

}
