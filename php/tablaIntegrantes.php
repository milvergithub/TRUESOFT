<?php
include './clases/RegistroTIS.php';
?>
<div class="table-responsive">
<table class="table table-hover table-bordered">
   <caption class="caption h3">INTEGRANTES DE LA EMPRESA</caption>
   <tr><th><span class="glyphicon glyphicon-picture h2"></span> foto</th><th>nombre</th><th>cedula</th><th><span class="glyphicon glyphicon-phone h2"></span> telefono</th><th><span class="glyphicon glyphicon-envelope h2"></span> email</th><th><span class="glyphicon glyphicon-trash h2"></span></th></tr>
   <?php 
   $integrantes=new RegistroTIS();
   $integrantes->dameIntegrantesRegistrados($empresas->dameNombreEmpresa($_SESSION['coduser']));
   ?>
</table>
</div>