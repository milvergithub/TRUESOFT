<div class="titulo panel">
   <h2 >Crear convocatoria</h2>
</div>
<div class="panel">
   <div class="alert alert-info">
      <b>Ingrese el nombre de convocatoria,el nombre que ingrese sera el nombre 
         de la convocatoria que se asignara para esta gestion ejemplo CPTIS-XX-XX</b>
   </div>
 <div class="container container-fluid"> 
      <form method="POST" enctype="multipart/form-data" class="form col-sm-8 col-md-5 col-lg-5 panel panel-default" id="formularioCrearConvocatoria">
         <br/>
         <div class="panel titulo">
            <h4>Formulario crear convocatoria</h4>
         </div>
         <span class="glyphicon"><b>Nombre Convocatoria :</b></span> 
         <input type="text" name="nombreconv" placeholder="nombre convocatoria" class="form-control input-sm" id="nombreconv"><br>
         <span class="glyphicon glyphicon-calendar"><b>Fecha Propuesta:</b></span>
         <input type="text" id="fechai" name="fecha" value="" onfocus="entraFoco(this);" onblur="saleFoco(this);" class="form-control"/><br>
         <input type="submit" name="subrirCrearConvocatoria" class="btn btn-primary navbar-right" value="crear"> 
       </form>
       <div class="" id="mensajeRegistroConvocatoria">
          
       </div>
    <div class="table-responsive panel panel-default">
       <?php
       require_once 'clases/ConexionTIS.php';
       $conexCov=new ConexionTIS();
       $resultado=$conexCov->dameConvocatorias();
       ?>
       <table class="table table-bordered table-striped table-condensed table-hover">
          <caption class="caption h3 subtitulo"><b>Lista de convocatorias</b></caption>
          <tr><th><b>nombre</b></th><th><b>fecha invitacion</b></th><th><b>fecha propuesta</b></th><th><b>gestion</b></th></tr>
          <?php
                 while ($regCV = pg_fetch_assoc($resultado)) {
                    echo '<tr><td>'.$regCV['nombre'].'</td>'
                           . '<td>'.$regCV['fechainv'].'</td>'
                           . '<td>'.$regCV['fechaprop'].'</td>'
                           . '<td>'.$regCV['gestion'].'</td>'
                       . '</tr>';
                 }
          ?>
       </table>
    </div>
 </div>
</div>