<?php

/*
  File name: CrimeDAO.php
  File description: persistence crime on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/model/Crime.php');
include_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');
include_once('C:/xampp/htdocs/mds2013/model/Kind.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TestConnection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/KindDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TimeDAO.php');

class CrimeDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Connection();
    }

    public function __constructTeste() {
        $this->conexao = new ConexaoTeste();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM crime";
        $result = $this->conexao->banco->Execute($sql);
        while ($register = $result->FetchNextObject()) {
            $dadosCrime = new Crime();
            $dataCrime->__constructOverload($register->ID_CRIME, $register->TEMPO_ID_TEMPO, $register->NATUREZA_ID_NATUREZA, $register->QUANTIDADE);
            $retornaCrimes[] = $dataCrime;
        }
        return $retornaCrimes;
    }

    public function consultarPorId($id) {
        $sql = "SELECT * FROM crime WHERE id_crime = '" . $id . "'";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        $dataCrime = new Crime();
        $dataCrime->__constructOverload($register->ID_CRIME, $register->TEMPO_ID_TEMPO, $register->NATUREZA_ID_NATUREZA, $register->QUANTIDADE);
        return $dataCrime;
    }

    public function consultarPorIdNatureza($id) {
        $sql = "SELECT * FROM crime WHERE natureza_id_natureza = '" . $id . "'";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        $dataCrime = new Crime();
        $dataCrime->__constructOverload($register->ID_CRIME, $register->TEMPO_ID_TEMPO, $register->NATUREZA_ID_NATUREZA, $register->QUANTIDADE);
        return $dataCrime;
    }

    public function consultarPorIdTempo($id) {
        $sql = "SELECT * FROM crime WHERE tempo_id_tempo = '" . $id . "'";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        $dataCrime = new Crime();
        $dataCrime->__constructOverload($register->ID_CRIME, $register->TEMPO_ID_TEMPO, $register->NATUREZA_ID_NATUREZA, $register->QUANTIDADE);
        return $dataCrime;
    }

    public function somaDeCrimePorAno($ano) {
        $sql = "SELECT SUM(c.quantidade) as total FROM crime c, tempo t WHERE t.ano = '" . $ano . "' AND c.tempo_id_tempo = t.id_tempo AND c.id_crime BETWEEN 1 AND 341";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaDeCrimePorNatureza($natureza) {
        $sql = "SELECT Sum(c.quantidade) as total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.natureza = '" . $natureza . "' AND c.id_crime BETWEEN 1 AND 341";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    //Metodo de somar todos homicícios por ano
    /**
     * @author Lucas Andrade Ribeiro
     * @author Sergio Silva
     * @copyright RadarCriminal 2013
     * */
    public function somaTotalHomicidios() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 1";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaDeCrimePorNaturezaEmAno($natureza, $ano) {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n,tempo t WHERE c.natureza_id_natureza = n.id_natureza AND c.tempo_id_tempo = t.id_tempo AND t.ano = " . $ano . " AND n.natureza = '" . $natureza . "'";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    //Metodo de somar todos homicícios por ano
    /**
     * @author Lucas Andrade Ribeiro
     * @author Sergio Silva
     * @copyright RadarCriminal 2013
     * */
    public function somaLesaoCorporal() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 3";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalTentativasHomicidio() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 2";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somarGeral() {
        $sql = "SELECT SUM(total) as total FROM totalgeralcrimes ";
        $result = $this->conexao->banco->Execute($sql);
        $register = $result->FetchNextObject();
        return $register->TOTAL;
    }

    //INICIO DOS MÉTODOS DE INSERÇÃO

    public function inserirCrime(Crime $crime) {
        $sql = "INSERT INTO crime (natureza_id_natureza,tempo_id_tempo,quantidade,regiao_administrativa_id_regiao_administrativa) VALUES ('{$crime->__getIdNatureza()}','{$crime->__getIdTempo()}','{$crime->__getQuantidade()}','{$crime->__getIdRegiaoAdministrativa()}')";
        $this->conexao->banco->Execute($sql);

        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConexaoFalha();
        //}
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //		throw new EConexaoFalha();
        //}
    }

}
