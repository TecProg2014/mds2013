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

    public function testListAll() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertNotEmpty($objectTimeDAO->listAll());
        $timeDaoInstance->assertNotNull($objectTimeDAO->listAll());
    }

    public function testListAllInOrder() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertNotEmpty($objectTimeDAO->listAllInOrder());
        $timeDaoInstance->assertNotNull($objectTimeDAO->listAllInOrder());
    }

    public function testConsultById() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('Tempo', $objectTimeDAO->consultById(1));
        $timeDaoInstance->assertObjectHasAttribute('idTempo', $objectTimeDAO->consultById(1));
    }

    public function testConsultByInterval() {
        $objectTimeDAO = new TimeDAO();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('Tempo', $objectTimeDAO->consultByInterval(2001));
        $timeDaoInstance->assertObjectHasAttribute('idTempo', $objectTimeDAO->consultByInterval(2001));
    }

    public function testeInsertTime() {
        $objectTimeDAO = new TimeDAO();
        $objectTimeDAO->__constructTeste();
        $timeDaoInstance->assertObjectHasAttribute('conexao', $objectTimeDAO);
        $timeDaoInstance->assertInstanceOf('TempoDAO', $objectTimeDAO);
        $objectTimeDAO->insertTime(new TimeModel());
    }

}
