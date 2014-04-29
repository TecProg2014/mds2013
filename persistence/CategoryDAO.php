<?php

/*
  File name: CategoriaDAO.php
  File description: persistence category on database
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Connection.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TestConnection.php');
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

    public function __constructTest() {
        $this->conexion = new ConexaoTeste();
    }

    public function listAllCategories() {
        $sql = "SELECT * FROM categoria";
        $databaseConexionResult = $this->conexion->banco->Execute($sql);
        while ($register = $databaseConexionResult->FetchNextObject()) {
            $categoryData = new Category();
            $categoryData->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $arrayOfCategories[] = $categoryData;
        }
        return $arrayOfCategories;
    }

    public function listAllCategoriesAlphabetically() {
        $sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
        $databaseConexionResult = $this->conexion->banco->Execute($sql);
        //if($resultado->RecordCount()== 0){
        //	throw new ECategoriaListarTodasAlfabeticamenteVazio();
        //}
        while ($register = $databaseConexionResult->FetchNextObject()) {
            $categoryData = new Category();
            $categoryData->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $arrayOfCategories[] = $categoryData;
        }
        return $arrayOfCategories;
    }

    public function consultCategoryById($id) {
        $sql = "SELECT * FROM categoria WHERE id_categoria = '" . $id . "'";
        $databaseConexionResult = $this->conexion->banco->Execute($sql);
        //if($resultado->RecordCount()== 0){
        //throw new ECategoriaListarConsultaPorIdVazio();
        //}
        $register = $databaseConexionResult->FetchNextObject();
        $categoryData = new Category();
        $categoryData->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $categoryData;
    }

    public function consultCategoryByName($categoryName) {
        $sql = "SELECT * FROM categoria WHERE nome_categoria = '" . $categoryName . "'";
        $databaseConexionResult = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult->FetchNextObject();
        //if($resultado->RecordCount()== 0){
        //throw new ECategoriaConsultarPorNomeVazio();
        //}
        $categoryData = new Category();
        $categoryData->__constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $categoryData;
    }

    public function insertCategory(Category $category) {
        $sql = "INSERT INTO categoria (nome_categoria) values ('{$category->__getCategoryName()}')";
        $databaseConexionResult = $this->conexion->banco->Execute($sql);
        return $databaseConexionResult;
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
    public function sumOfCrimesAgainstPerson() {
        $sql = "SELECT SUM( c.quantidade ) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfPoliceActions() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 26 AND 29";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfCrimeSexualDignity() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 24 AND 25";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfSteals() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 6 AND 18";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfThefts() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 19 AND 23";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfCrimesAgainstProperty() {
        $sql = "SELECT SUM(total) as total FROM totalcrimecontrapatrimonio";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function listTotalOfCategories() {
        $sql = "SELECT * FROM totalgeralcategoria";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $i = 0;
        while ($register = $databaseConexionResult ->FetchNextObject()) {
            $categoryTotal["nome"][$i] = $register->NOME_CATEGORIA;
            $categoryTotal["quantidade"][$i] = $register->TOTAL;
            $i++;
        }
        return $categoryTotal;
    }

    public function sumTotalTransit() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 29 AND 30";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function countCategoryRegisters() {
        $sql = "SELECT COUNT(id_categoria)AS total FROM categoria";
        $databaseConexionResult  = $this->conexion->banco->Execute($sql);
        $register = $databaseConexionResult ->FetchNextObject();
        return $register->TOTAL;
    }

}
