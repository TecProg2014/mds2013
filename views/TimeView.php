<?php

/*
  File name: TimeView.php
  File description: return time
 */
include_once('C:/xampp/htdocs/mds2013/controller/TimeController.php');

class TimeView {

    private $timeCO;

    public function __construct() {
        $this->tempoCO = new TimeController();
    }

    public function returnDataTimeFormated() {
        return $this->tempoCO->_returnDataFormated();
    }

    //Metodo duplicado para adaptacao do retorno de dados para a nova interface
    /**
     * @author Eduardo Augusto
     * @author Sergio Silva
     * @author Eliseu Egewarth
     * @copyright RadarCriminal 2013
     * */
    
    public function returnDataTimeFormatedNew() {
        return $this->tempoCO->_returnDataFormatNew();
    }

}
