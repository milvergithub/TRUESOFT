<?php

   include 'clases/config.php';
   $conf = new config();
?>  
<div class="container container-fluid panel panel-default">
   <?php
   if (isset($_REQUEST['configuracionadminhoradocente'])) {
   ?>
   <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="index.php?configuracionadminhoradocente"><span class="glyphicon glyphicon-calendar"></span><b>Horarios</b></a></li>
      <li><a href="index.php?configuracionadminestadodoc"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Docentes</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Representantes</a></li>
   </ul>
   <div class="table-responsive">
      <table class="table table-bordered table-condensed table-hover table-striped">
         <caption class="caption h4">Configuracion Horarios</caption>
         <tr> <th>Nombre Docente</th><th>Grupo</th><th>Dia</th><th>Hora</th><th></th></tr>
       <?php $conf->obtenerDatosDoc(); ?>

      </table>
   </div>
   <?php
   }
   if (isset($_REQUEST['configuracionadminestadodoc'])) {
   ?>
   <ul class="nav nav-tabs nav-justified">
      <li><a href="index.php?configuracionadminhoradocente"><span class="glyphicon glyphicon-calendar"></span><b>Horarios</b></a></li>
      <li class="active"><a href="index.php?configuracionadminestadodoc"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Docentes</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Representantes</a></li>
   </ul>
   <div class="table-responsive">
      <h2>Habilitar/Deshabilitar Docentes</h2>
      <table class="table table-bordered table-condensed table-hover table-striped">
         <tr><th>Docente</th><th>Estado</th><th></th></tr>
         <?php $conf->obtenerEstDoc(); ?>
      </table>
   </div>
   <?php
   }
   ?>

</div>