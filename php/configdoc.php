<?php
        include 'clases/config.php';
        $conf = new config();
    ?> 
    <h1>Configuracion</h1>
<div class="form-horizontal">
   <div class="well container container-fluid col-lg-6">
      <div id="mensajeNumeroRevisiones">
         <div class="alert alert-info">
            el numero que ingrese sera el numero de revisiones que se realizara por dia de clases
         </div>
      </div>
      <form class="form col-lg-12" id="formularioNumeroRevisiones">
         <span class="">Numero de revisiones</span>
         <input class="form-control col-lg-3 col-md-4 numerico" type="text" name="cantidad" id="cantidad" placeholder="numero de reviciones"/><br/>
         <input class="btn btn-primary" type="submit" value="generar" /> 
      </form>     
   </div>
   <div class="container container-fluid col-lg-6 well well-lg">
      <div id="mensajeUpdateFechaProp">
         
      </div>
      <form class="form col-lg-12" id="formularioActualizarFechaLimitePropuesta">
            <h4>Editar fecha de presentacion propuesta</h4>
            <span class="label label-default">Fecha Actual</span>
            <?php
               $variables=$conf->dameFechaActualLimiteEntregaPartes($_SESSION['coduser']);
            ?>
            <span class="label label-default">Fecha Nueva</span>
            <input class="form-control fecha" type="text"  name="fechaNueva" id="fechaNueva"/>
            <input class="btn btn-primary" type="submit" value="Cambiar" />
        </form>
   </div>
   <div class="container container-fluid col-lg-6 well">
      <div id="mensajeUpdateFechaDocum">

      </div>
      <form class="form col-lg-12" method="POST" id="formularioActualizarFechaLimitedocumentacion">
         <h4>Editar fecha de presentacion documentacion</h4>
         <span class="label label-default">Fecha Actual</span>
         <?php
            $datosDoc=$conf->dameFechaActualLimiteEntregaDocumen($_SESSION['coduser']);
         ?>
         <span class="label label-default">Fecha Nueva</span>
         <input class="form-control fecha" type="text" name="fechaNN" id="fechaNN"/>
         <input class="btn btn-primary" type="submit"/>
      </form>
   </div>
   <div class="table-responsive well container container-fluid col-lg-6 panel panel-default">  
      <table class="table table-bordered table-hover table-striped table-condensed">
         <caption class="caption h3">Habilitar/Deshabiltar Grupo-Empresas</caption> 
         <tr> 
          <th>Grupo-Empresa</th><th>Representante</th><th>Estado</th>
          </tr
              <?php
              $conf->getGrupoComp($_SESSION['coduser']);
              ?>
      </table>
    </div>
    </div>
    
    
    
    
