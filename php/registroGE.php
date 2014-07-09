<?php
if (isset($_REQUEST[md5('errorNombreGrupoEmpresa')])) {
   $error=TRUE;
}
else{
   $error=FALSE;
}
?>
<div class="panel panel-info col-lg-12 panelaso">
   <?php
   if (isset($_REQUEST["registroEmpresaHorario"])) {
   ?>
   <div class="col-lg-12">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous"><a href="index.php?RegistroEmpresaAIntegrantes">&numsp;Integrantes  &rarr;&numsp;&numsp;</a></li>
         <li class="previous disabled "><a >&numsp;&numsp;&numsp;Horario&rarr;&numsp;&numsp;&numsp;</a></li>
      </ul>
      <div class="progress progress-striped active">
         <span class="">66% completado</span>
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
           <span class="sr-only success">66% completado</span>
         </div>
      </div>
      <div id="mensajeFormularioHorario">

      </div>
      <form class="form col-lg-6" action="" method="POST" id="formularioRegistroHorario">
         <div class="control-group">
            <span class="glyphicon">grupo</span>
            <select id="elegirgrupo"  class="form-control combo" name="grupoDoc" onchange="enviarGrupo(this.value)">
               <?php include 'docentes.php'; ?>
            </select>
         </div>
         <div class="control-group">
            <span class="glyphicon">dia</span>
            <select id="elegirdia"  class="form-control combo" name="dia" onchange="enviarDia(this.value)">
               <option value="">seleccione grupo</option> 
            </select>
         </div>
         <div class="control-group">
            <span class="glyphicon">hora</span>
            <select id="elegirhorario"  class="form-control combo" name="horario">
               <option value="">seleccione dia</option>
            </select>
         </div><br/>
         <input type="submit" class="btn btn-primary btn-sm navbar-right" value="validar horario"/><br/><br/>
      </form>
   </div>
   <?php
   }
   if(isset($_REQUEST[md5('registroCompleto')])){
   ?>
   <div class="">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous"><a href="index.php?RegistroEmpresaAIntegrantes">&numsp;Integrantes  &rarr;&numsp;&numsp;</a></li>
         <li class="previous"><a href="index.php?registroEmpresaHorario">&numsp;&numsp;&numsp;Horario&rarr;&numsp;&numsp;&numsp;</a></li>
      </ul>
      <div class="progress progress-striped active">
         <span class=""></span>
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
           <span class="sr-only success">100% completado</span>
         </div>
      </div>
      <div class="container container-fluid">
         <h3 class="h3">Registro completado en un 100%</h3>
      </div>
   </div>
   <?php
   }
   if ((isset($_REQUEST['RegistroEmpresaAIntegrantes']))){
      ?>
   <div class="col-lg-12">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous disabled"><a >&#32;Integrantes  &rarr;&#32;&#32;</a></li>
         <li class="previous disabled "><a >&#32;&#32;&#32;Horario&rarr;&#32;&#32;&#32;</a></li>
      </ul>
      <div class="progress progress-striped active col-lg-12">
         <span class="">33% completado</span>
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
           <span class="sr-only success">33% completado</span>
         </div>
      </div>
      <div class="panel panel-heading panel-success well-lg">
           <div class="form-group">
              <label for="" class="col-lg-12 h4 control-label">Nombre Empresa : 
                 <?php
                       include 'clases/GrupoEmpresas.php';
                       $empresas=new GrupoEmpresa();
                       echo " ".$empresas->dameNombreEmpresa($_SESSION['coduser'])."";
                 ?>
              </label><br/>
           </div>
      </div>
      <div class="table-responsive">
         <?php
                 include_once 'php/tablaIntegrantes.php';
         ?>
      </div>
      <div class="" id="mensajeFormularioRegistroIntegrante">

      </div>
      <label class="control-label subtitulo panel col-lg-12"><h3 class="h2">Formulario Registros Integrantes</h3></label>
      <form class="form well col-lg-6" method="post" id="formularioRegistroIntegrantes">
         <div class="control-group">
            <span class="">Nombres * :</span>
            <input type='text' class='form-control input-sm ' name='nombres' placeholder='nombre integrante' id="nombres" required='true'>
         </div>
         <div class="control-group">
            <span class="">C.I. * : </span>
            <input type='text' class='form-control input-sm' name='carnets' placeholder='numero ci' id='carnets' required='true'>
         </div>
         <div class="control-group">
             <span class='glyphicon glyphicon-earphone'> Telefono:</span>
             <input type='text' class='form-control input-sm' name='telefonos' id='telefonos' placeholder='telefono'>
         </div>
         <div class="control-group">
             <span class='glyphicon glyphicon-envelope'> Email:</span>
             <input type='text' class='form-control input-sm' name='emails' id="emails" placeholder='ejemplo@dominio.com'><br/>
         </div>
         <div class="control-group">
           <img src="img/fotos/foto.png" height="100" width="100" id="fotoIntegrante">
         </div>
         <input type='file' class='btn btn-primary btn-sm' name='fotos' id="fotos" title='Escoger foto &#x02007;'><br/><br/>
         <input type="hidden" name="nombreGE" value="<?php echo $empresas->dameNombreEmpresa($_SESSION['coduser']); ?>" id="nombreGE"/>
         <button type="submit" id="btnRegistrar" class="btn btn-primary navbar-right">Registrar</button>
      </form>
      <div class="well col-lg-6"></div>
   </div>
      <?php
   }
   if (isset($_REQUEST['registroEmpresa'])) {
     ?>
     <div class="well-lg container col-lg-12">
         <ul class="pager">
            <li class="previous disabled"><a >Grupo Empresa &rarr;</a></li>
            <li class="previous disabled"><a >&#32;Integrantes  &rarr;&#32;&#32;</a></li>
            <li class="previous disabled"><a >&#32;&#32;&#32;Horario&rarr;&#32;&#32;&#32;</a></li>
         </ul>
         <div class="progress progress-striped active">
            <span class="">0% completado</span>
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
              <span class="sr-only success">0% completado</span>
            </div>
         </div>
         <div id="mensajeRegistroGrupoEmpresa" class="col-lg-12">
           
         </div>
        <form method="POST" id="formularioRegistroGE" enctype="multipart/form-data">
           <div class="form-horizontal">
             <div class="form-group">
                <label for="nombreGE" class="col-lg-3 control-label " >Nombre para la Grupo Empresa</label>
                <div class="control-group col-lg-3">
                   <input type="text" class="form-control input-sm" id="nombreGE" name="nombreGE" placeholder="nombre grupo empresa" required="true">
                </div>
             </div>
              <div class="form-group">
                <label for="logo" class="col-lg-2 control-label">subir logo</label>
                <div class="col-lg-6">
                   <input type="file" id="logo" value="imagen" name="logo" class="btn btn-primary" title="subir logo"/>
                   <img id="logoimg" src="img/logos/defecto.png" class="img-thumbnail img-rounded col-sm-5"/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-3">
                   <input type="submit" class="btn btn-primary navbar-right" value="Registrar nombre Grupo empresa">
                </div>
              </div>
           </div>
        </form>
        <div >
           <div id="" class='alert alert-warning col-lg-12'>
            Por normas de registro en la grupoempresaTIS usted debe registrar un nombre para su grupo empresa que no 
            este registrado
            en los registros existentes en la fundaempresaTIS para consultar empresas existentes haga click
            <?php echo '<a href="index.php?'.md5("consultaNombreEmpresas").'" class="btn btn-link" >Aqui</a>'; ?>
         </div>
        </div>
     </div>
     <?php
   }
   ?>
</div>