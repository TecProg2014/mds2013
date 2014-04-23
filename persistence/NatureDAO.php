<?php

/*
  File name: NaturezaDAO.php
  File description: persistence kind on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/model/Nature.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodosVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodasAlfabeticamenteVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorIdVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorNomeVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class NatureDAO {

    private $establishesConnectionNature;

    public function __construct() {
        $natureDAOInstance->establishesConnectionNature = new Conexao();
    }

    public function __constructTeste() {
        $natureDAOInstance->establishesConnectionNature = new ConexaoTeste();
    }

    public function listarTodas() {
        $sqlCommand = "SELECT * FROM natureza";
        $resultList = $natureDAOInstance->establishesConnectionNature->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $natureData = new Natureza();
            $natureData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturListNatures[] = $natureData;
        }
        
        return $arrayReturListNatures;
    }

    public function listarTodasAlfabicamente() {
        $sqlCommand = "SELECT * FROM natureza ORDER BY natureza ASC ";
        $resultList = $natureDAOInstance->establishesConnectionNature->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $natureData = new Natureza();
            $natureData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturnListNatures[] = $natureData;
        }
        
        return $arrayReturnListNatures;
    }

    public function consultarPorId($id_nature) {
        $sqlCommand = "SELECT * FROM natureza WHERE id_natureza = '" . $id_nature . "'";
        $resultList = $natureDAOInstance->establishesConnectionNature->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $natureData = new Natureza();
        $natureData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $natureData;
    }

    public function consultarPorNome($natureName) {

        $sqlCommand = "SELECT * FROM natureza WHERE natureza = '" . $natureName . "'";
        $resultList = $nature_DAO_instance->establishesConnectionNature->database->Execute($sqlCommand);
        $recordedList = $resultList->FetchNextObject();
        $natureData = new Natureza();
        $natureData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
        return $natureData;
    }

    public function inserirNatureza(Natureza $natureName) {
        $sqlCommand = "INSERT INTO natureza (categoria_id_categoria,natureza) values ('{$natureNameame->__getIdCategoria()}','{$natureName->__getNatureza()}')";
        $natureDAOInstance->establishesConnectionNature->database->Execute($sqlCommand);
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConexaoFalha();	
        //}				
    }

    
    public function consultarPorIdCategoria($idNature) {
        $sqlCommand = "SELECT * FROM natureza WHERE categoria_id_categoria= '" . $idNature . "'";
        $resultList = $natureDAOInstance->establishesConnectionNature->database->Execute($sqlCommand);
        
        while ($recordedList = $resultList->FetchNextObject()) {
            $natureData = new Natureza();
            $natureData->__constructOverload($recordedList->ID_NATUREZA, $recordedList->NATUREZA, $recordedList->CATEGORIA_ID_CATEGORIA);
            $arrayReturnListNatures[] = $natureData;
        }
        
        return $arrayReturnListNatures;
    }

}
