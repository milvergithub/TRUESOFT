<?php
include 'clases/GestionDocumentos.php';
$gestionDoc=new GestionDocumentos();
?>
<div class="panel col-lg-12">
   <div class="panel col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo">
      <b class="h3 caption">Opciones de busqueda</b>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3">
      <label class="label label-default">Buscar por :</label>
      <select name="categoria" id="categoria" class="form-control combo col-lg-4 col-md-4">
         <option value="any">cualquiera</option>
         <option value="convocatoria">convocatoria</option>
         <option value="gestion">gestion</option>
         <option value="tipodocumento">tipo documento</option>
      </select>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-2">
      <label class="label label-default">Opciones</label>
      <select name="codigos" id="codigos" class="form-control combo col-lg-4 col-md-4">
      
      </select>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-2">
      <label class="label label-default">cantidad</label>
      <select name="cantidad" id="cantidad" class="form-control combo">
         <option value="10">10</option>
         <option value="20">20</option>
         <option value="50">50</option>
         <option value="100">100</option>
      </select>
   </div>
   <div class="input-group col-lg-5 col-md-5 col-sm-5">
      <label class="label label-default">texto a buscar</label>
      <input type="text" class="form-control input-sm">
   </div>
   <div class="panel table-responsive">
      <table class="table" id="contenidoDescarga">
         <?php $gestionDoc->dameDocumentosDescarga(1, 1, 1, 100, "a", "") ?>
      </table>
   </div>
</div>