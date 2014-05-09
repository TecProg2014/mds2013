<?php

/*
  File name: CategoryController.php
  File description: insert, consult, show and sum some category information
 */

include_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoryController {

    private $categoryDAO;

    public function construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    public function constructTeste() {
        //tests instance of categoryDAO
        $this->categoryDAO-> constructTest();
    }

    public function listAllCategories() {
        //lists categorys
        $arrayCategoria = $this->categoryDAO->listAllCategories();
        return $arrayCategoria;
    }

    public function listAllCategoriesAlphabetically() {
        //lists categorys alphabeticaly
        return $this->categoryDAO->listAllCategoriesAlphabetically();
    }

    public function consultCategoryByName($id) {
        //consults category by its id	
        if (!is_numeric($id)) {
            throw new EErroConsulta();
        }
        $category = $this->categoryDAO-> listAllCategories($id);
        return $category;
    }

    public function consultarPorNome($categoryName) {
        //consults category by name	
        if (!is_string($categoryName)) {
            throw new EErroConsulta();
        }
        $category = $this->categoryDAO->consultCategoryByName($categoryName);
        return $category;
    }

    public function insertCategory(Category $category) {
        //inserts categories
        return $this->categoryDAO->insertCategory($category);
    }

    public function insertCategoryArrayParseSerie($arraycategory) {
        if (!is_array($arrayCategory)) {
            throw new EErroConsulta();
        }
        $dateCategory = new Category();
        for ($i = 0; $i < count($arrayCategory); $i++) {
            $dateCategory->__setcategoryName($arraycategory[$i]);
            $retorno = $this->categoryDAO->insertCategory($dateCategory);
        }
        return $retorno;
    }

    public function sumTotalThefts() {
        //all thefts category
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalThefts[] = $this->categoryDAO->sumOfThefts($i);
        }
        $returnSumTotalThefts = array_sum($sumTotalThefts);
        return $returnSumTotalThefts;
    }

    public function sumTotalSexualDignity() {
        //all crimes in sexual dignity category
        $sumSexualDignity;
        for ($i = 2001; $i < 2012; $i++) {
            $sumSexualDignity[] = $this-> sumTotalSexualDignity($i);
        }
        $returnSumTotalSexualDignity = array_sum($sumSexualDignity);
        return $returnSumTotalSexualDignity;
    }

    public function sumTotalSexualDignity2010_2011() {
        //all crimes in sexual dignity in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalSexualDignity2010_2011[] = $this-> sumTotalSexualDignity($i);
        }
        $returnSumTotalSexualDignity2010_2011 = array_sum($sumTotalSexualDignity2010_2011);
        return $returnSumTotalSexualDignity2010_2011;
    }

    public function sumTotalOfPoliceActions() {
        //all policial actions
        for ($i = 2001; $i < 2012; $i++) {
            $sumTotalOfPoliceActions[] = $this-> sumTotalOfPoliceActions($i);
        }
        $returnSumTotalOfPoliceActions = array_sum($sumTotalOfPoliceActions);
        return $returnSumTotalOfPoliceActions;
    }

    public function sumOfPoliceActions2010_2011() {
        //all policial actions in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumOfPoliceActions2010_2011[] = $this-> sumTotalOfPoliceActions($i);
        }
        $returnSumOfPoliceActions2010_2011 = array_sum($sumOfPoliceActions2010_2011);
        return $returnSumOfPoliceActions2010_2011;
    }

    public function sumTotalOfCrimesAgainstPerson() {
        //all crimes against person category
        for ($i = 2001; $i < 2012; $i++) {
            $sumTotalOfCrimesAgainstPerson[] = $this->categoryDAO->sumTotalOfCrimesAgainstPerson($i);
        }
        $returnSumTotalOfCrimesAgainstPerson = array_sum($sumTotalOfCrimesAgainstPerson);
        return $returnSumTotalOfCrimesAgainstPerson;
    }

    public function sumTotalOfCrimesAgainstPerson2010_2011() {
        //all crimes against person in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalOfCrimesAgainstPerson2010_2011[] = $this->categoryDAO->sumOfCrimesAgainstPerson($i);
        }
        $returnSumTotalOfCrimesAgainstPerson2010_2011 = array_sum($sumTotalOfCrimesAgainstPerson2010_2011);
        return $returnSumTotalOfCrimesAgainstPerson2010_2011;
    }

    public function sumTotalOfSteals() {
        //all robberies categories
        for ($i = 2001; $i < 2012; $i++) {
            $sumTotalOfSteals[] = $this->categoryDAO->sumTotalOfSteals($i);
        }
        $returnosumTotalOfSteals = array_sum($sumTotalOfSteals);
        return $returnSumTotalOfSteals;
    }

    public function sumTotalOfSteals2010_2011() {
        //all robberies in 2010 and 2011
        for ($i = 2010; $i < 2012; $i++) {
            $sumTotalOfSteals2010_2011[] = $this->sumTotalOfSteals($i);
        }
        $returnoSumTotalStealing2010_2011 = array_sum($sumTotalOfSteals2010_2011);
        return $returnoSumTotalOfSteals2010_2011;
    }

    public function countCategoryRegisters() {
        //count records
        return $this->categoryDAO->countCategoryRegisters();
    }

    public function listTotalOfCategories() {
        //lists all categories
        $categories = $this->categoryDAO->listTotalOfCategories();
        return "
		var data = [
		{ label: \"" . $categories["nome"][0] . "\",  data: " . $categories["quantidade"][0] . "},
		{ label: \"" . $categories["nome"][1] . "\",  data: " . $categories["quantidade"][1] . "},
		{ label: \"" . $categories["nome"][2] . "\",  data: " . $categories["quantidade"][2] . "},
		{ label: \"" . $categories["nome"][3] . "\",  data: " . $categories["quantidade"][3] . "},
		{ label: \"" . $categories["nome"][4] . "\",  data: " . $categories["quantidade"][4] . "}
		];";
    }

}
