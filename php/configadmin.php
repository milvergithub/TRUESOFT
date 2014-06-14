<?php

   include 'clases/config.php';
   $conf = new config();
?>  
<div class="container container-fluid panel panel-default">
   <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-calendar"></span>Horarios</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Docentes</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span>Representantes</a></li>
</ul>
<h1>Configuracion</h1>
<div>
   <h2>Cambiar Horario Docentes</h2>
       <table>
           <tr> 
           <th>Nombre Docente</th><th>Grupo</th><th>Dia</th><th>Hora</th>
           </tr>
           <?php $conf->obtenerDatosDoc(); ?>

       </table>
</div>
<div>
   <h2>Habilitar/Deshabilitar Docentes</h2>
       <table>
           <tr><th>Docente</th><th>Estado</th></tr>
           <?php $conf->obtenerEstDoc(); ?>
       </table>
</div>
</div>