<?php

/*
  File name: TimeView.php
  File description: return time
 */

/**Class for objects of type TimeView, which will be contained, values ​​and methods for the same. 

  * @since 2013

 */
include_once('C:/xampp/htdocs/mds2013/controller/TimeController.php');

class TimeView {

    private $timeCO;

    /** Method to instantiate a TimeController
      * @return void
    */
    public function __construct() {
        $this->tempoCO = new TimeController();
    }

    /** Method to return a data formated
      * @return Array of integers - Data
    */
    public function returnDataTimeFormated() {
        return $this->tempoCO->_returnDataFormated();
    }

    /** Method to return a data formated
      * @return Array of integers - Data
    */
    public function returnDataTimeFormatedNew() {
        return $this->tempoCO->_returnDataFormatNew();
    }

}
