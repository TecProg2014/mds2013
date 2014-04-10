<?php
require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CategoriaController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/NaturezaController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/TempoController.php');

class RunParse{
	private $parse;
	private $categoriaCO;
	private $crimeCO;
	private $naturezaCO;
	private $tempoCO;
	public function __construct(){
	
		$this->categoriaCO = new CategoriaController();
		$this->crimeCO = new CrimeController();
		$this->naturezaCO = new NaturezaController();
		$this->tempoCO = new TempoController();
		
		
		$this->parse = new Parse("JAN_SET_2011_12  POR REGIAO ADM_2.xls");
		print_r($this->parse->__getRegiao());
		
	}
}
