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
        $this->timeDAO = new TimeDAO();
    }

    public function _listAll() {
        //lists times
        return $this->timeDAO->listAll();
    }

    public function _listAllInOrder() {
        //lists times in order
        return $this->timeDAO->listAllInOrder();
    }

    public function __constructTest() {
        //tests instance of timeDAO
        $this->timeDAO->__constructTest();
    }

    public function _consultById($id) {
        //consult time by its id
        return $this->timeDAO->consultById($id);
    }

    public function _consultByInterval($interval) {
        //consult by time's interval
        return $this->timeDAO->consultByInterval($interval);
    }

    public function _insertTime(TimeModel $time) {
        //insert time
        return $this->timeDAO->insertTime($time);
    }

    public function _insertTimeArrayParse($arrayTime) {
        for ($i = 0; $i < count($arrayTime); $i++) {
            $dataTime = new TimeModel();
            $dataTime->__setInterval($arrayTime[$i]);
            $this->timeDAO->insertTime($dataTime);
        }
    }

    public function _insertTimeArrayParseQuaterly($arrayTime) {
        //insert times quarterly 
        for ($i = 0, $arrayYear = $arrayTime; $i < count($arrayTime); $i++) {
            $year = key($arrayYear);
            $dataTime = new TimeModel();
            $dataTime->__setInterval($year);
            for ($j = 0; $j < count($arrayTime[$year]); $j++) {
                $dataTime->__setMonth($year[$year][$j]);
                $this->timeDAO->insertTime($dataTime);
            }
            next($arrayYear);
        }
    }

    public function _returnDataFormated() {
        //returns formatted data
        $dataTime = new TimeModel();
        $year = $this->_listAll();
        for ($i = 0; $i < count($year); $i++) {
            $dataTime = $year[$i];
            $dados[$i] = $dataTime->__getInterval();
        }
        return "labels : [\"$dados[0]\",\"$dados[1]\",\"$dados[2]\",\"$dados[3]\",\"$dados[4]\",\"$dados[5]\",\"$dados[6]\",\"$dados[7]\",\"$dados[8]\",\"$dados[9]\",\"$dados[10]\"]";
    }

}
