<?php

/*
  File name: Tempo.php
  File description: time model
 */

include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Tempo {

    private $timeId;
    private $interval;
    private $month;

    public function __settimeId($timeId) {
        //Method to modify the instance of the time attribute 	
        if (!is_numeric($timeId)) {
            throw new ETipoErrado();
        }
        $this->timeId = $timeId;
    }

    public function __gettimeId() {
        //Method to access the instance of time attribute
        return $this->timeId;
    }

    public function __setinterval($interval) {
        //Method to modify the instance of the interval attribute 	
        if (!is_numeric($interval)) {
            throw new ETipoErrado();
        }
        $this->interval = $interval;
    }

    public function __getinterval() {
        //Method to access the instance of interval attribute
        return $this->interval;
    }

    public function __setmonth($month) {
        //Method to modify the instance of the month attribute 
        $this->month = $month;
    }

    public function __getmonth() {
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
