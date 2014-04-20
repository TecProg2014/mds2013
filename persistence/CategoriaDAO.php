<?php

/*
  File name: CategoriaDAO.php
  File description: persistence category on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarTodasVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarTodasAlfabeticamenteVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarConsultaPorIdVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaConsultarPorNomeVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class CategoriaDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexao();
    }

    public function __constructTeste() {
        $this->conexion = new ConexaoTeste();
    }

    public function listarTodas() {
        $sql = "SELECT * FROM categoria";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        while ($register = $database_conexion_result->FetchNextObject()) {
            $category_data = new Categoria();
            $category_data->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $array_of_categories[] = $category_data;
        }
        return $array_of_categories;
    }

    public function listarTodasAlfabicamente() {
        $sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        //if($resultado->RecordCount()== 0){
        //	throw new ECategoriaListarTodasAlfabeticamenteVazio();
        //}
        while ($register = $database_conexion_result->FetchNextObject()) {
            $category_data = new Categoria();
            $category_data->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $array_of_categories[] = $category_data;
        }
        return $array_of_categories;
    }

    public function consultarPorId($id) {
        $sql = "SELECT * FROM categoria WHERE id_categoria = '" . $id . "'";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        //if($resultado->RecordCount()== 0){
        //throw new ECategoriaListarConsultaPorIdVazio();
        //}
        $register = $database_conexion_result->FetchNextObject();
        $category_data = new Categoria();
        $category_data->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $category_data;
    }

    public function consultarPorNome($nomeCategoria) {
        $sql = "SELECT * FROM categoria WHERE nome_categoria = '" . $nomeCategoria . "'";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        //if($resultado->RecordCount()== 0){
        //throw new ECategoriaConsultarPorNomeVazio();
        //}
        $category_data = new Categoria();
        $category_data->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $category_data;
    }

    public function inserirCategoria(Categoria $categoria) {
        $sql = "INSERT INTO categoria (nome_categoria) values ('{$categoria->__getNomeCategoria()}')";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        return $database_conexion_result;
        //if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
        //	throw new EConexaoFalha();	
        //}
    }

    //Somatórios de Categorias
    /**
     * @author Sergio Silva
     * @author Eliseu Egewarth
     * @author Eduardo Augusto
     * @copyright RadarCriminal 2013
     * */
    public function somaGeralCrimeContraPessoa() {
        $sql = "SELECT SUM( c.quantidade ) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalAcaoPolicial() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 26 AND 29";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalDignidadeSexual() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 24 AND 25";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalRoubo() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 6 AND 18";
        $resultadodatabase_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $resultado->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalFurtos() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 19 AND 23";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function somaTotalContraPatrimonio() {
        $sql = "SELECT SUM(total) as total FROM totalcrimecontrapatrimonio";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function listarTotalDeCategoria() {
        $sql = "SELECT * FROM totalgeralcategoria";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $i = 0;
        while ($register = $database_conexion_result->FetchNextObject()) {
            $category_total["nome"][$i] = $register->NOME_CATEGORIA;
            $category_total["quantidade"][$i] = $register->TOTAL;
            $i++;
        }
        return $category_total;
    }

    public function somaTotalTransito() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 29 AND 30";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

    public function contarRegistros() {
        $sql = "SELECT COUNT(id_categoria)AS total FROM categoria";
        $database_conexion_result = $this->conexion->banco->Execute($sql);
        $register = $database_conexion_result->FetchNextObject();
        return $register->TOTAL;
    }

}
