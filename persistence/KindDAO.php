<?php

/*
  File name: KindDAO.php
  File description: persistence kind on database
 */
include_once('C:/xampp/htdocs/mds2013/model/Kind.php');
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TestConnection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EKindListAllEmpty.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EKindListAllAlphabeticalEmpty.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EKindConsultByEmptyId.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EKindConsultByEmptyName.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConnectionFail.php');

class KindDAO {

    private $establishesConnectionKindCrime;

    public function __construct() {
        /**
        * constructor
        * 
        * @param      no parameters
        * @return     no return   
        */
        $kindCrimeDAOInstance->establishesConnectionKindCrime = new Connection();
    }

    public function __constructTeste() {
        /**
        * test constructor 
        * 
        * @param      no parameters
        * @return     no return   
        */
        $kindCrimeDAOInstance->establishesConnectionKindCrime = new TestConnection();
    }

    public function listarTodas() {
        /**
        * list all kinds in database
        * 
        * @param      no parameters
        * @return     array of kinds in database   
        */
        $sqlCommand = "SELECT * FROM natureza";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $kindCrimeData = new Kind();
            $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturListKindCrime[] = $kindCrimeData;
        }
        
        return $arrayReturListKindCrime;
    }

    public function listarTodasAlfabicamente() {
        /**
        * list all kinds in database alphabetically
        * 
        * @param      no parameters
        * @return     array of kinds in database  alphabetically 
        */
        $sqlCommand = "SELECT * FROM natureza ORDER BY natureza ASC ";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $kindCrimeData = new Kind();
            $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturnListKindCrime[] = $kindCrimeData;
        }
        
        return $arrayReturnListKindCrime;
    }

    public function consultarPorId($idKindCrimeDao) {
        /**
        * consult kind by identifier in database
        * 
        * @param  idKindCrimeDao    identifier of kind
        * @return                   data of kind consulted  
        */
        $sqlCommand = "SELECT * FROM natureza WHERE id_natureza = '" . $idKindCrimeDao . "'";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $kindCrimeData = new Kind();
        $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $kindCrimeData;
    }

    public function consultarPorNome($kindCrimeName) {
        /**
        * consult kind by name in database
        * 
        * @param  kindCrimeName     name of kind
        * @return                   data of kind consulted  
        */
        $sqlCommand = "SELECT * FROM natureza WHERE natureza = '" . $kindCrimeName . "'";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $kindCrimeData = new Kind();
        $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $kindCrimeData;
    }

    public function inserirNatureza(Kind $kindCrimeName) {
        /**
        * insert kind by name in database
        * 
        * @param  kindCrimeName     name of kind
        * @return                   no return 
        */
        $sqlCommand = "INSERT INTO natureza (categoria_id_categoria,natureza) values ('{$kindCrimeName->__getIdCategory()}','{$kindCrimeName->__getNatureza()}')";
        $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConnectionFail();	
        //}				
    }

    
    public function consultarPorIdCategoria($idKindCrimeDao) {
        /**
        * consult kind by identifier category in database
        * 
        * @param  idKindCrimeDao    identifier of kind
        * @return                   array that list kinds 
        */
        $sqlCommand = "SELECT * FROM natureza WHERE categoria_id_categoria= '" . $idKindCrimeDao . "'";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $kindCrimeData = new Kind();
            $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturnListKindCrime[] = $kindCrimeData;
        }
        
        return $arrayReturnListKindCrime;
    }

}
