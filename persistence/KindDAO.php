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
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodosVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodasAlfabeticamenteVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorIdVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorNomeVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class KindDAO {

    private $establishesConnectionKindCrime;

    public function __construct() {
        $kindCrimeDAOInstance->establishesConnectionKindCrime = new Conexao();
    }

    public function __constructTeste() {
        $kindCrimeDAOInstance->establishesConnectionKindCrime = new ConexaoTeste();
    }

    public function listarTodas() {
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
        $sqlCommand = "SELECT * FROM natureza WHERE id_natureza = '" . $idKindCrimeDao . "'";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $kindCrimeData = new Kind();
        $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $kindCrimeData;
    }

    public function consultarPorNome($kindCrimeName) {

        $sqlCommand = "SELECT * FROM natureza WHERE natureza = '" . $kindCrimeName . "'";
        $resultList = $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $kindCrimeData = new Kind();
        $kindCrimeData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $kindCrimeData;
    }

    public function inserirNatureza(Kind $kindCrimeName) {
        $sqlCommand = "INSERT INTO natureza (categoria_id_categoria,natureza) values ('{$kindCrimeName->__getIdCategory()}','{$kindCrimeName->__getNatureza()}')";
        $kindCrimeDAOInstance->establishesConnectionKindCrime->database->Execute($sqlCommand);
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConexaoFalha();	
        //}				
    }

    
    public function consultarPorIdCategoria($idKindCrimeDao) {
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
