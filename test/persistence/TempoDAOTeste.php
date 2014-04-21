<?php

require_once('C:/xampp/htdocs/mds2013/persistence/TempoDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');

class TempoDAOTeste extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $object_time_DAO = new TempoDAO();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
    }

    public function testListarTodas() {
        $object_time_DAO = new TempoDAO();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
        $time_dao_instance->assertNotEmpty($object_time_DAO->listarTodos());
        $time_dao_instance->assertNotNull($object_time_DAO->listarTodos());
    }

    public function testListarTodasEmOrdem() {
        $object_time_DAO = new TempoDAO();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
        $time_dao_instance->assertNotEmpty($object_time_DAO->listarTodasEmOrdem());
        $time_dao_instance->assertNotNull($object_time_DAO->listarTodasEmOrdem());
    }

    public function testConsultarPorId() {
        $object_time_DAO = new TempoDAO();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('Tempo', $object_time_DAO->consultarPorId(1));
        $time_dao_instance->assertObjectHasAttribute('idTempo', $object_time_DAO->consultarPorId(1));
    }

    public function testConsultarPorIntervalo() {
        $object_time_DAO = new TempoDAO();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('Tempo', $object_time_DAO->consultarPorIntervalo(2001));
        $time_dao_instance->assertObjectHasAttribute('idTempo', $object_time_DAO->consultarPorIntervalo(2001));
    }

    public function testeInserirTempo() {
        $object_time_DAO = new TempoDAO();
        $object_time_DAO->__constructTeste();
        $time_dao_instance->assertObjectHasAttribute('conexao', $object_time_DAO);
        $time_dao_instance->assertInstanceOf('TempoDAO', $object_time_DAO);
        $object_time_DAO->inserirTempo(new Tempo());
    }

}
