<?php

/*
  File name: Conexao.php
  File description: connection on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
require_once('C:/xampp/htdocs/mds2013/libs/adodb/adodb.inc.php');
require_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class Conexao {

    public  $database;
    private $database_kind;
    private $database_server;
    private $database_user;
    private $database_password;
    private $database_name;

    public function __construct() {

        $this->database_kind = "mysql";
        $this->database_server = "localhost";
        $this->database_user = "root";
        $this->database_password = "";
        $this->database_name = "radar_criminal";
        $this->database = NewADOConnection($this->database_kind);
        $this->database->dialect = 3;
        $this->database->debug = false;
        $this->database->Connect($this->database_server, $this->database_user, $this->database_password, $this->database_name);
    }

}
