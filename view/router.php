<?php

/*
  File name: router.php
  File description: router.
 */

$kind_of_page = isset($_GET['pag']) ? $_GET['pag'] : null;
switch ($kind_of_page) {
    case 'ano':
        include('/mds2013/view/year.php');
        break;
    case 'tipo':
        include('/mds2013/view/type.php');
        break;
    case 'tRA':
        include('C:/xampp/htdocs/mds2013/view/totalra.php');
        break;
    case 'cCat':
        include('C:/xampp/htdocs/mds2013/view/crimeporcat.php');
        break;
    case 'u':
        include('C:/xampp/htdocs/mds2013/view/crimeporra.php');
        break;
    default:
        include('C:/xampp/htdocs/mds2013/view/initial.php');
        break;
}