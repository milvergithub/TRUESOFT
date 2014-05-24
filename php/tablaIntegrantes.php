<?php
include './clases/RegistroTIS.php';
?>
<div class="table-responsive">
<table class="table table-hover table-bordered">
   <caption class="caption">INTEGRANTES DE LA EMPRESA</caption>
   <tr><th>foto</th><th>nombre</th><th>cedula</th><th>telefono</th><th>email</th><th><span class="glyphicon glyphicon-trash"></span></th></tr>
   <?php 
   $integrantes=new RegistroTIS();
   $integrantes->dameIntegrantesRegistrados("trueblue");
   ?>
</table>
</div>