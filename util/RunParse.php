<?php

require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
include_once ('C:/xampp/htdocs/mds2013/controller/category_controllerntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/crime_controllerntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/nature_controlntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/time_controlntroller.php');

class RunParse {

    private $parse;
    private $category_controller;
    private $crime_controller;
    private $nature_control;
    private $time_control;

    public function __construct() {

        $this->category_controller = new category_controllerntroller();
        $this->crime_controller = new crime_controllerntroller();
        $this->nature_control = new nature_controlntroller();
        $this->time_control = new time_controlntroller();


        $this->parse = new Parse("JAN_SET_2011_12  POR REGIAO ADM_2.xls");
        print_r($this->parse->__getRegiao());
    }

}
