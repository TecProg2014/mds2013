<?php

/*
  File name: crimeporra.php
  File description: view crimes in a administrative region .
 */

include_once('./views/CrimeView.php');
include_once('./views/TimeView.php');
$crimeView = new CrimeView();
$timeView = new TempoView();
?>
<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid">

        <div class="box span12">
            <div class="box-header">
                <h2><a href="#" class="btn-minimize"><i class="icon-tasks"></i>$Tipo</a></h2>
                <div class="box-icon">
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content" style="display: none;">
                <h3>$PorAno</h3>
                <p>AQUI VEM AS INFO POR ANO</p>

                <h3>$PorRA</h3>
                <p>AQUI VEM AS INFO POR RA</p>							

            </div>
        </div><!--/span-->

    </div>

    <div class="row-fluid">

        <div class="box span12">
            <div class="box-header">
                <h2><a href="#" class="btn-minimize"><i class="icon-tasks"></i>$Tipo</a></h2>
                <div class="box-icon">
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content" style="display: none;">
                <h3>$PorAno</h3>
                <p>AQUI VEM AS INFO POR ANO</p>

                <h3>$PorRA</h3>
                <p>AQUI VEM AS INFO POR RA</p>							

            </div>
        </div><!--/span-->

    </div>

    <div class="row-fluid">

        <div class="box span12">
            <div class="box-header">
                <h2><a href="#" class="btn-minimize"><i class="icon-tasks"></i>$Tipo</a></h2>
                <div class="box-icon">
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content" style="display: none;">
                <h3>$PorAno</h3>
                <p>AQUI VEM AS INFO POR ANO</p>

                <h3>$PorRA</h3>
                <p>AQUI VEM AS INFO POR RA</p>							

            </div>
        </div><!--/span-->

    </div>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
