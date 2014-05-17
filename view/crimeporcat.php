<?php

/*
  File name: crimeporcat.php
  File description: view crime in a category.
 */

include_once('./views/CrimeView.php');
include_once('./views/TimeView.php');
include_once('./views/KindView.php');
include_once('./views/CategoryView.php');
$crimeView = new CrimeView();
$timeView = new TempoView();
$kindView = new NaturezaView();
$categoryView = new CategoriaView();
$idCategory = isset($_GET['id']) ? $_GET['id'] : null;
?>
<!-- start: Content -->
<div id="content" class="span10">

    <?php
    $tr = $kindView->aposBarraLateral($idCategory);
    for ($i = 0; $i < count($tr); $i++) {
        echo utf8_encode($tr[$i]);
    }
    ?>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
