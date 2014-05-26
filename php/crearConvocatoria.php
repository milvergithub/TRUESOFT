<h2>CREAR CONVOCATORIA</h2>
<div>
 <div class="container container-fluid">
    <div class="row">
       <form  method="POST" enctype="multipart/form-data" class="form col-sm-8 col-md-5 col-lg-5" id="formularioCrearConvocatoria">
           <span class="glyphicon">Nombre Convocatoria :</span> 
           <input type="text" name="nombreconv" placeholder="nombre convocatoria" class="form-control input-sm" id="nombreconv"><br>
           <span class="glyphicon glyphicon-calendar">Fecha Propuesta:</span>
           <input type="text" id="fechai" name="fecha" value="" onfocus="entraFoco(this);" onblur="saleFoco(this);" class="form-control"/><br>
           <input type="submit" name="subrirCrearConvocatoria" class="btn btn-primary navbar-right"> 
       </form>
       <div class="" id="mensajeRegistroConvocatoria">
          
       </div>
    </div>
 </div>
</div>