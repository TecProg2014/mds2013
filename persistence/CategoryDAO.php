<?php

/*
  File name: CategoriaDAO.php
  File description: persistence category on database
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

    private $connection;

    public function __construct() {
        $this->connection = new Conexao();
    }

    public function constructTest() {
        $this->connection = new TestConnection();
    }

    public function listAllCategories() {
        $sql = "SELECT * FROM categoria";
        $databaseconnectionResult = $this->connection->database->Execute($sql);
        while ($register = $databaseconnectionResult->FetchNextObject()) {
            $categoryData = new Category();
            $categoryData-> constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $arrayOfCategories[] = $categoryData;
        }
        return $arrayOfCategories;
    }

    public function listAllCategoriesAlphabetically() {
        $sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
        $databaseconnectionResult = $this->connection->database->Execute($sql);
        //if($resultado->RecordCount()== 0){
        //	throw new ECategoriaListarTodasAlfabeticamenteVazio();
        //}
        while ($register = $databaseconnectionResult->FetchNextObject()) {
            $categoryData = new Category();
            $categoryData->constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
            $arrayOfCategories[] = $categoryData;
        }
        return $arrayOfCategories;
    }

    public function consultCategoryById($id) {
        $sql = "SELECT * FROM categoria WHERE id_categoria = '" . $id . "'";
        $databaseconnectionResult = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult->FetchNextObject();
        $categoryData = new Category();
        $categoryData->constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $categoryData;
    }

    public function consultCategoryByName($categoryName) {
        $sql = "SELECT * FROM categoria WHERE nome_categoria = '" . $categoryName . "'";
        $databaseconnectionResult = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult->FetchNextObject();
        $categoryData = new Category();
        $categoryData-> constructOverload($register->ID_CATEGORIA, $register->NOME_CATEGORIA);
        return $categoryData;
    }

    public function insertCategory(Category $category) {
        $sql = "INSERT INTO categoria (nome_categoria) values ('{$category->__getCategoryName()}')";
        $databaseconnectionResult = $this->connection->database->Execute($sql);
        return $databaseconnectionResult;
    }

    public function sumOfCrimesAgainstPerson() {
        $sql = "SELECT SUM( c.quantidade ) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumTotalOfPoliceActions() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 26 AND 29";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumTotalSexualDignity() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 24 AND 25";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfSteals() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 6 AND 18";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumTotalThefts() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 19 AND 23";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function sumOfCrimesAgainstProperty() {
        $sql = "SELECT SUM(total) as total FROM totalcrimecontrapatrimonio";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function listTotalOfCategories() {
        $sql = "SELECT * FROM totalgeralcategoria";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $i = 0;
        while ($register = $databaseconnectionResult ->FetchNextObject()) {
            $categoryTotal["nome"][$i] = $register->NOME_CATEGORIA;
            $categoryTotal["quantidade"][$i] = $register->TOTAL;
            $i++;
        }
        return $categoryTotal;
    }

    public function sumTotalTransit() {
        $sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 29 AND 30";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

    public function countCategoryRegisters() {
        $sql = "SELECT COUNT(id_categoria)AS total FROM categoria";
        $databaseconnectionResult  = $this->connection->database->Execute($sql);
        $register = $databaseconnectionResult ->FetchNextObject();
        return $register->TOTAL;
    }

}
