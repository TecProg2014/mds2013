<?php

/*
  File name: TimeController.php
  File description: insert, consult, show some time information
 */

include_once('C:/xampp/htdocs/mds2013/persistence/TimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeController {

    private $timeDAO;

    public function __construct() {
        $this->timeDAO = new tempoDAO();
    }

    public function _listarTodos() {
        //lists times
        return $this->timeDAO->listarTodos();
    }

    public function _listarTodasEmOrdem() {
        //lists times in order
        return $this->timeDAO->listarTodasEmOrdem();
    }

    public function __constructTeste() {
        //tests instance of timeDAO
        $this->timeDAO->__constructTeste();
    }

    public function _consultarPorId($id) {
        //consult time by its id
        return $this->timeDAO->consultarPorId($id);
    }

    public function _consultarPorinterval($interval) {
        //consult by time's interval
        return $this->timeDAO->consultarPorinterval($interval);
    }

    public function _inserirTempo(Tempo $time) {
        //insert time
        return $this->timeDAO->inserirTempo($time);
    }

    public function _inserirTempoArrayParse($arrayTime) {
        for ($i = 0; $i < count($arrayTime); $i++) {
            $dataTime = new Tempo();
            $dataTime->__setinterval($arrayTime[$i]);
            $this->timeDAO->inserirTempo($dataTime);
        }
    }

    public function _inserirTempoArrayParseQuadrimestral($arrayTime) {
        //insert times quarterly 
        for ($i = 0, $arrayYear = $arrayTime; $i < count($arrayTime); $i++) {
            $year = key($arrayYear);
            $dataTime = new Tempo();
            $dataTime->__setinterval($year);
            for ($j = 0; $j < count($arrayTime[$year]); $j++) {
                $dataTime->__setMes($year[$year][$j]);
                $this->timeDAO->inserirTempo($dataTime);
            }
            next($arrayYear);
        }
    }

    public function _retornarDadosFormatados() {
        //returns formatted data
        $dataTime = new Tempo();
        $year = $this->_listarTodos();
        for ($i = 0; $i < count($year); $i++) {
            $dataTime = $year[$i];
            $dados[$i] = $dataTime->__getinterval();
        }
        return "labels : [\"$dados[0]\",\"$dados[1]\",\"$dados[2]\",\"$dados[3]\",\"$dados[4]\",\"$dados[5]\",\"$dados[6]\",\"$dados[7]\",\"$dados[8]\",\"$dados[9]\",\"$dados[10]\"]";
    }

}
