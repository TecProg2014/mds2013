<?php

/*
  File name: TimeDAOTest.php
  File description: tests the class TimeDAO using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/persistence/TimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');

class TimeDAOTest extends PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
    }

    public function testListarTodas() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertNotEmpty($objectTimeDAO->listarTodos());
        $timeDaoInstance->assertNotNull($objectTimeDAO->listarTodos());
    }

    public function testListarTodasEmOrdem() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertNotEmpty($objectTimeDAO->listarTodasEmOrdem());
        $timeDaoInstance->assertNotNull($objectTimeDAO->listarTodasEmOrdem());
    }

    public function testConsultarPorId() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('Tempo', $objectTimeDAO->consultarPorId(1));
        $timeDaoInstance->assertObjectHasAttribute('idTempo', $objectTimeDAO->consultarPorId(1));
    }

    public function testConsultarPorIntervalo() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('Tempo', $objectTimeDAO->consultarPorIntervalo(2001));
        $timeDaoInstance->assertObjectHasAttribute('idTempo', $objectTimeDAO->consultarPorIntervalo(2001));
    }

    public function testeInserirTempo() {
        $objectTimeDAO = new TimeDAO();
        $objectTimeDAO->__constructTeste();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $objectTimeDAO->inserirTempo(new Tempo());
    }

}
