<?php

require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
include_once ('C:/xampp/htdocs/mds2013/controller/categoryControllerntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/crimeControllerntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/kindControlntroller.php');
include_once ('C:/xampp/htdocs/mds2013/controller/timeControlntroller.php');

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
