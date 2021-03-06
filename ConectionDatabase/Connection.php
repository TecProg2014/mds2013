<?php

/*
  File name: Connection.php
  File description: connection on database
 */
require_once('C:/xampp/htdocs/mds2013/libs/adodb/adodb.inc.php');
require_once('C:/xampp/htdocs/mds2013/exceptions/EConnectionFail.php');

class Connection {

 	public $database;
	private $databaseKind;
	private $databaseServer;
	private $databaseUser;
	private $databasePassword;
	private $databaseName;
        
	public function __construct(){
		$this->databaseKind    = "mysql";
		$this->databaseServer      = "localhost";
		$this->databaseUser       = "root";
		$this->databasePassword         = "";
		$this->databaseName            = "radar_criminal";
		$this->database = NewADOConnection($this->databaseKind);
		$this->database->dialect = 3;
		$this->database->debug = false;
		$this->database->Connect($this->databaseServer,$this->databaseUser,$this->databasePassword,$this->databaseName);

        }
}
