<?php

/*
  File name: viewController.php
  File description: view controller.
 */

$kind_of_page = isset($_GET['pag']) ? $_GET['pag'] : null;
switch ($kind_of_page) {
    case 'ano':
        include('C:/xampp/htdocs/mds2013/view/year.php');
        break;
    case 'tipo':
        include('C:/xampp/htdocs/mds2013/view/type.php');
        break;
    default:
        include('./view/index.php');
}