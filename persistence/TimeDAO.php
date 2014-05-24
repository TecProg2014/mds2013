<?php

/*
  File name: TimeDAO.php
  File description: persistence time on database
 */
include_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TestConnection.php');

class TimeDAO {

    private $connection;

    /** Method to start a new connection
     * @return connection - coonection to the database
    */
    public function __construct() {
        $this->connection = new Connection();
    }

    /** Method to enable the test of class Connection
     * @return connection - connection to the database.
    */
    public function __constructTest() {
        $this->connection = new TestConnection();
    }
    
    /** Method that lists all times
     * @return resultOfTime - the list (array) of all the times
    */
    public function listAll() {
        $sql = "SELECT * FROM tempo";
        $result = $this->connection->database->Execute($sql);
        while ($registry = $result->FetchNextObject()) {
            $dataTime = new TimeModel();
            $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
            $resultOfTime[] = $dataTime;
        }
        return $resultOfTime;
    }
    
    /** Method that lists all times in order
     * @return resultOfTime - the list (array) of all the times
    */
    public function listAllInOrder() {
        $sql = "SELECT * FROM tempo ORDER BY ano ASC ";
        $result = $this->connection->database->Execute($sql);
        while ($registry = $result->FetchNextObject()) {
            $dataTime = new TimeModel();
            $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
            $resultOfTime[] = $dataTime;
        }
        return $resultOfTime;
    }

    public function consultById($id) {
        $sql = "SELECT * FROM tempo WHERE id_tempo = '" . $id . "'";
        $result = $this->connection->database->Execute($sql);
        $registry = $result->FetchNextObject();
        $dataTime = new TimeModel();
        $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
        return $dataTime;
    }

    public function consultByInterval($interval) {
        $sql = "SELECT * FROM tempo WHERE ano = '" . $interval . "'";
        $result = $this->connection->database->Execute($sql);
        $registry = $result->FetchNextObject();
        $dataTime = new TimeModel();
        $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
        return $dataTime;
    }

    public function insertTime(TimeModel $time) {
        $sql = "INSERT INTO tempo (ano) VALUES ('{$time->__getInterval()}')";
        $this->connection->database->Execute($sql);
    }

}
