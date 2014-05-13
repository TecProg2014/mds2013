<?php

/*
  File name: ConexaoTeste.php
  File description: connection test with database
 */
require_once('C:/xampp/htdocs/mds2013/libs/adodb/adodb.inc.php');
require_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class ConexaoTeste {

    public $banco;
    private $dataBase_type;
    private $server;
    private $user;
    private $password;
    private $db;

    public function __construct() {

        $this->dataBase_type = "mysql";
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "radar_criminal_teste";
        $this->dataBase = NewADOConnection($this->dataBase_type);
        $this->dataBase->dialect = 3;
        $this->dataBase->debug = false;
        $this->dataBase->Connect($this->server, $this->user, $this->password, $this->db);
    }

}
