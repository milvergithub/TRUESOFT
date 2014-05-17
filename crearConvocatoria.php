
<?php include 'php/head.php'; ?>
<h2>CREAR CONVOCATORIA</h2>
<div>
 <div class="container container-fluid">
    <div class="row">
        <form  method="POST" action="subrirCrearConvocatoria.php" enctype="multipart/form-data" class="form col-lg-5">
           <span class="glyphicon">Nombre Convocatoria :</span> 
           <input type="text" name="nombreconv" placeholder="nombre convocatoria" class="form-control input-sm"><br>
           <span class="glyphicon glyphicon-calendar">Fecha Propuesta:</span>
           <input type="text" id="fechai" name="fecha" value="" onfocus="entraFoco(this);" onblur="saleFoco(this);" class="form-control"/><br>
           <input type="submit" name="subrirCrearConvocatoria" class="btn btn-primary navbar-right"> 
        </form>
    </div>
 </div>
</div>