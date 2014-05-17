<?php

/*
  File name: CategoryView.php
  File description: show, consult and sum categories
 */
include_once('C:/xampp/htdocs/mds2013/controller/CategoryController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EWrongConsult.php');

class CategoryView {

    private $categoryController;

    public function construct() {
        $this->categoryController = new CategoryController();
    }

    public function listAllCategories() {
        $arrayOfCategories = $this->categoryController-> listAllCategories();
        if (!is_array($arrayOfCategories)) {
            throw new EWrongConsult();
        }
        return $arrayOfCategories;
    }

    public function listAllCategoriesAlphabetically() {
        $arrayOfCategories = $this->categoryController->listAllCategoriesAlphabetically();
        for ($i = 0, $categories_return = ""; $i < count($arrayOfCategories); $i++) {
            $category_auxiliar_variable = $arrayOfCategories[$i];
            $category_name = $category_auxiliar_variable-> getCategoryName();
            $id_category = $category_auxiliar_variable-> getIdCategory();
            $categories_return = $categories_return . "<li><a class=\"submenu\" href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">$category_name</span></a></li>";
        }
        return $categories_return;
    }

    public function listAllAlphabeticallyPure() {
        $arrayOfCategories = $this->categoryController->listAllCategoriesAlphabetically();
        return $arrayOfCategories;
    }

    public function consultCategoryById($id) {
        $category = $this->categoryController-> consultCategoryById($id);
        if (get_class($category) != 'Categoria') {
            throw new EWrongConsult();
        }
        return $category;
    }

    public function consultByName($categoryName) {
        $category = $this->categoryController-> consultByName($categoryName);
        if (get_class($category) != 'Categoria') {
            throw new EWrongConsult();
        }
        return $category;
    }

    public function countCategoryRegisters() {
        return $this->categoryController-> countCategoryRegisters();
    }

    public function sumTotalSexualDignity() {
        return $this->categoryController->sumTotalSexualDignity();
    }

    public function sumTotalSexualDignity2010_2011() {
        return $this->categoryController->sumTotalSexualDignity2010_2011();
    }

    public function sumTotalOfPoliceActions() {
        return $this->categoryController->sumTotalOfPoliceActions();
    }

    public function sumOfPoliceActions2010_2011() {
        return $this->categoryController->sumOfPoliceActions2010_2011();
    }

    public function sumTotalOfCrimesAgainstPerson() {
        return $this->categoryController->sumTotalOfCrimesAgainstPerson();
    }

    public function sumTotalOfCrimesAgainstPerson2010_2011() {
        return $this->categoryController->sumTotalOfCrimesAgainstPerson2010_2011();
    }

    public function sumTotalOfSteals() {
        return $this->categoryController->sumTotalOfSteals();
    }

    public function sumTotalOfSteals2010_2011() {
        return $this->categoryController->sumTotalOfSteals2010_2011();
    }

    public function sumTotalThefts() {
        return $this->categoryController->sumTotalThefts();
    }

    public function listTotalOfCategories() {
        return $this->categoryController->listTotalOfCategories();
    }

}
