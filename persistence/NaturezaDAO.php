<?php

/*
  File name: NaturezaDAO.php
  File description: persistence kind on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/model/Natureza.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodosVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaListarTodasAlfabeticamenteVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorIdVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ENaturezaConsultarPorNomeVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class NaturezaDAO {

    private $establishes_connection_nature;

    public function __construct() {
        $nature_DAO_instance->establishes_connection_nature = new Conexao();
    }

    public function __constructTeste() {
        $nature_DAO_instance->establishes_connection_nature = new ConexaoTeste();
    }

    public function listarTodas() {
        $sql_command = "SELECT * FROM natureza";
        $result_list = $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        
        while ($recorded_list = $result_list->FetchNextObject()) {
            $nature_data = new Natureza();
            $nature_data->__constructOverload($recorded_list->ID_NATUREZA, $recorded_list->NATUREZA, $recorded_list->CATEGORIA_ID_CATEGORIA);
            $array_return_list_natures[] = $nature_data;
        }
        
        return $array_return_list_natures;
    }

    public function listarTodasAlfabicamente() {
        $sql_command = "SELECT * FROM natureza ORDER BY natureza ASC ";
        $result_list = $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        
        while ($recorded_list = $result_list->FetchNextObject()) {
            $nature_data = new Natureza();
            $nature_data->__constructOverload($recorded_list->ID_NATUREZA, $recorded_list->NATUREZA, $recorded_list->CATEGORIA_ID_CATEGORIA);
            $array_return_list_natures[] = $nature_data;
        }
        
        return $array_return_list_natures;
    }

    public function consultarPorId($id_nature) {
        $sql_command = "SELECT * FROM natureza WHERE id_natureza = '" . $id_nature . "'";
        $result_list = $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        $recorded_list = $resultado->FetchNextObject();
        $nature_data = new Natureza();
        $nature_data->__constructOverload($recorded_list->ID_NATUREZA, $recorded_list->NATUREZA, $recorded_list->CATEGORIA_ID_CATEGORIA);
        return $nature_data;
    }

    public function consultarPorNome($nature_name) {

        $sql_command = "SELECT * FROM natureza WHERE natureza = '" . $nature_name . "'";
        $result_list = $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        $recorded_list = $result_list->FetchNextObject();
        $nature_data = new Natureza();
        $nature_data->__constructOverload($recorded_list->ID_NATUREZA, $recorded_list->NATUREZA, $recorded_list->CATEGORIA_ID_CATEGORIA);
        return $nature_data;
    }

    public function inserirNatureza(Natureza $nature_name) {
        $sql_command = "INSERT INTO natureza (categoria_id_categoria,natureza) values ('{$nature_name->__getIdCategoria()}','{$nature_name->__getNatureza()}')";
        $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConexaoFalha();	
        //}				
    }

    
    public function consultarPorIdCategoria($id_nature) {
        $sql_command = "SELECT * FROM natureza WHERE categoria_id_categoria= '" . $id_nature . "'";
        $result_list = $nature_DAO_instance->establishes_connection_nature->banco->Execute($sql_command);
        
        while ($recorded_list = $result_list->FetchNextObject()) {
            $nature_data = new Natureza();
            $nature_data->__constructOverload($recorded_list->ID_NATUREZA, $recorded_list->NATUREZA, $recorded_list->CATEGORIA_ID_CATEGORIA);
            $array_return_list_natures[] = $nature_data;
        }
        
        return $array_return_list_natures;
    }

}
