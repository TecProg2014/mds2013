<?php

/*
  File name: TimeController.php
  File description: insert, consult, show some time information
 */

include_once('C:/xampp/htdocs/mds2013/persistence/TimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/TimeModel.php');

class TimeController {

    private $timeDAO;

    
    /** Method to instantiate an objct timeDAO
     * @return an object timeDAO 
    */
    public function __construct() {
        $this->timeDAO = new TimeDAO();
    }

    /** Method for calling the method that lists all times
     * @return timeDAO - the list of all the times
    */
    public function _listAll() {
        //lists times
        return $this->timeDAO->listAll();
    }

    /** Method for calling the method that lists all times in order
     * @return timeDAO - the list of all the times in order
    */
    public function _listAllInOrder() {
        //lists times in order
        return $this->timeDAO->listAllInOrder();
    }

    /** Method for enabling the test of the class TimeDAO
     * @return an object timeDAO.
    */
    public function __constructTest() {
        //tests instance of timeDAO
        $this->timeDAO->__constructTest();
    }
    
    /** Method to consult time when the crimes occurred by id
     * @param id - id of time which the crimes occurred.
     * @return an object timeDAO.
    */
    public function _consultById($id) {
        //consult time by its id
        return $this->timeDAO->consultById($id);
    }
    /** Method to consult time when the crimes occurred by interval
     * @param interval - interval of time which the crimes occurred.
     * @return an object timeDAO.
    */
    public function _consultByInterval($interval) {
        //consult by time's interval
        return $this->timeDAO->consultByInterval($interval);
    }

    /** Method to insert the time when the crimes occurred
     * @param time - Year in which the crime occurred.
     * @return an object timeDAO.
    */
    public function _insertTime(TimeModel $time) {
        //insert time
        return $this->timeDAO->insertTime($time);
    }

    /** Method to insert the time when the crimes occurred
     * @param arrayTime - Array of integers - Years in which the crimes occurred.
     * @return void.
    */
    public function _insertTimeArrayParse($arrayTime) {
        for ($i = 0; $i < count($arrayTime); $i++) {
            $dataTime = new TimeModel();
            $dataTime->__setInterval($arrayTime[$i]);
            $this->timeDAO->insertTime($dataTime);
        }
    }

    /** Method to return a data formated
      * @return Array of integers - Years in which the crimes occurred.
    */
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

    /** Method to return a data formated
      * @return Array of integers - Data
    */
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
