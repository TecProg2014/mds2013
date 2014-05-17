<?php

/*
  File name: RunParse.php
  File description: executes the parses.
 */

require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CategoryController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/KindController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/TimeController.php');

class RunParse {

    private $parse;
    private $categoryController;
    private $crimeController;
    private $kindControl;
    private $timeControl;

    public function __construct() {

        $this->categoryController = new categoryControllerntroller();
        $this->crimeController = new crimeControllerntroller();
        $this->kindControl = new kindControlntroller();
        $this->timeControl = new timeControlntroller();


        $this->parse = new Parse("JAN_SET_2011_12  POR REGIAO ADM_2.xls");
        print_r($this->parse->__getRegiao());
    }

}
