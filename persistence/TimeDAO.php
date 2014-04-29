<?php

/*
  File name: TempoDAO.php
  File description: persistence time on database
 */
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');

class TempoDAO {

    private $connection;

    public function __construct() {
        $this->connection = new Conexao();
    }

    public function __constructTeste() {
        $this->connection = new ConexaoTeste();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM tempo";
        $result = $this->connection->database->Execute($sql);
        while ($registry = $result->FetchNextObject()) {
            $dataTime = new Tempo();
            $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
            $resultOfTime[] = $dataTime;
        }
        return $resultOfTime;
    }

    public function listarTodasEmOrdem() {
        $sql = "SELECT * FROM tempo ORDER BY ano ASC ";
        $result = $this->connection->database->Execute($sql);
        while ($registry = $result->FetchNextObject()) {
            $dataTime = new Tempo();
            $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
            $resultOfTime[] = $dataTime;
        }
        return $resultOfTime;
    }

    public function consultarPorId($id) {
        $sql = "SELECT * FROM tempo WHERE id_tempo = '" . $id . "'";
        $result = $this->connection->database->Execute($sql);
        $registry = $result->FetchNextObject();
        $dataTime = new Tempo();
        $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
        return $dataTime;
    }

    public function consultarPorIntervalo($intervalo) {
        $sql = "SELECT * FROM tempo WHERE ano = '" . $intervalo . "'";
        $result = $this->connection->database->Execute($sql);
        $registry = $result->FetchNextObject();
        $dataTime = new Tempo();
        $dataTime->__constructOverload($registry->ID_TEMPO, $registry->ANO, $registry->MES);
        return $dataTime;
    }

    public function inserirTempo(Tempo $tempo) {
        $sql = "INSERT INTO tempo (ano) VALUES ('{$tempo->__getIntervalo()}')";
        $this->connection->database->Execute($sql);
    }

}
