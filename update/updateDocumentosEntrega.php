<?php
include 'clases/GestionDocumentos.php';
$gestioDoc=new GestionDocumentos();
?>
<div class="container container-fluid panel panel-primary">
   <div class="alert alert-info">
      El nombre del documento con el que se creo es la que podemos ver
      en el campo de texto usted puede modificarlo ingreseando un nuevo nombre
   </div>
   <form class="form col-lg-6" method="POST" id="formularioEditDocEntrega">
      <div class="control-group">
         <span class="label label-default">nombre</span>
         <?php
         echo '<input type="text" name="nombre" value="'.$_GET['nombre'].'" id="nombre" class="form-control"/>';
         ?>
      </div>
      <div class="control-group">
         <span class="label label-default">tipo</span>
         <select class="form-control" name="tipo" id="tipo">
            <option value="">selecionar</option>
            <?php $gestioDoc->dameDocumentosTipoPresentacion(); ?>
         </select>
      </div>
      <div class="control-group">
         <span class="label label-default">nota</span>
         <?php
         echo '<input type="text" name="nota" value="'.$_GET['nota'].'" id="nota" class="form-control"/>';
         ?>
      </div>
      <div class="control-group">
         <span class="label label-default">archivo actual</span>
         <?php
         echo '<a href="'.$_GET['ruta'].'" class="btn btn-link"><span class="glyphicon glyphicon-download-alt"> Descargar</span></a>';
         ?>
      </div>
      <div class="control-group">
         <span class="label label-default">subir nuevamente</span>
         <input type="file" class="btn btn-primary btn-sm" name="archivo"/>
      </div>
      <br/>
      <input type="submit" value="Modificar" class="btn btn-primary"/>
      <a class="btn btn-primary" href="index.php?creardocumentoentrega" >
         <span class="glyphicon glyphicon-backward"> Volver atras</span>
      </a>
   </form>
</div>