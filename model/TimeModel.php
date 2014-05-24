<?php

/*
  File name: TimeModel.php
  File description: time model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETypeWrong.php');

class TimeModel {

    private $timeId;
    private $interval;
    private $month;

    /** Method to modify the instance of the time attribute
     * @param timeId
     * @return void
    */
    public function __setTimeId($timeId) {
        //Method to modify the instance of the time attribute 	
        if (!is_numeric($timeId)) {
            throw new ETypeWrong();
        }
        $this->timeId = $timeId;
    }

    public function __getTimeId() {
        //Method to access the instance of time attribute
        return $this->timeId;
    }

    public function __setInterval($interval) {
        //Method to modify the instance of the interval attribute 	
        if (!is_numeric($interval)) {
            throw new ETypeWrong();
        }
        $this->interval = $interval;
    }

    public function __getInterval() {
        //Method to access the instance of interval attribute
        return $this->interval;
    }

    public function __setMonth($month) {
        //Method to modify the instance of the month attribute 
        $this->month = $month;
    }

    public function __getMonth() {
        //Method to access the instance of month attribute
        return $this->month;
    }

    public function __construct() {
        //Default constructor method of class	
    }

    public function __constructOverload($timeId, $interval, $month) {
        //Constructor method of class	
        $this->timeId = $timeId;
        $this->interval = $interval;
        $this->month = $month;
    }

}
