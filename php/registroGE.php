<?php
if (isset($_REQUEST[md5('errorNombreGrupoEmpresa')])) {
   $error=TRUE;
}
else{
   $error=FALSE;
}
?>
<div class="container panel panel-info">
   <?php
   if (isset($_REQUEST[md5("registroEmpresaHorario")])) {
   ?>
   <div class="container container-fluid">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous"><a href="">&numsp;Integrantes  &rarr;&numsp;&numsp;</a></li>
         <li class="previous disabled "><a >&numsp;&numsp;&numsp;Horario&rarr;&numsp;&numsp;&numsp;</a></li>
      </ul>
      <div class="progress progress-striped active">
         <span class="">66% completado</span>
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
           <span class="sr-only success">66% completado</span>
         </div>
      </div>
      <form class="form col-lg-6" action="" method="POST">
         <span>seleccione grupo</span>
         <select id="elegirgrupo"  class="form-control" name="grupoDoc" onchange="enviarGrupo(this.value)">
            <?php include 'docentes.php'; ?>
         </select><br/>
         <span>seleccione dia presentacion</span>
         <select id="elegirdia"  class="form-control" name="dia" onchange="enviarDia(this.value)">
            <option value="-1">seleccione grupo</option> 
         </select><br/>
         <span>seleccione hora presentacion</span>
         <select id="elegirhorario"  class="form-control" name="horario">
            <option value="-1">seleccione dia</option>
         </select><br/>
         <input type="submit" class="btn btn-primary btn-sm navbar-right" value="validar horario"/><br/><br/>
      </form>
   </div>
   <?php
   }
   if(isset($_REQUEST[md5('registroCompleto')])){
   ?>
   <div class="container container-fluid">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous"><a href="">&numsp;Integrantes  &rarr;&numsp;&numsp;</a></li>
         <li class="previous"><a href="">&numsp;&numsp;&numsp;Horario&rarr;&numsp;&numsp;&numsp;</a></li>
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
   if ($_REQUEST[md5('RegistroEmpresaAIntegrantes')]||(isset($_REQUEST[md5('continuarRegistroEmpresaAIntegrantes')]))||(isset($_REQUEST[md5('RegistroEmpresaAIntegrantes')]))){
      ?>
   <div class="container container-fluid">
      <ul class="pager">
         <li class="previous"><a href="">Grupo Empresa &rarr;</a></li>
         <li class="previous disabled"><a >&#32;Integrantes  &rarr;&#32;&#32;</a></li>
         <li class="previous disabled "><a >&#32;&#32;&#32;Horario&rarr;&#32;&#32;&#32;</a></li>
      </ul>
      <div class="progress progress-striped active">
         <span class="">33% completado</span>
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
           <span class="sr-only success">33% completado</span>
         </div>
      </div>
      <form class="form-horizontal panel panel-default" role="form" action="php/validarIntegrantesGE.php" method="post" >
        <div class="panel panel-heading panel-success well-lg">
           <div class="form-group">
              <label for="" class="col-lg-2 control-label">Nombre Empresa</label>
              <div class="col-lg-10">
                 <h3 class="h3">
                 <?php
                       include 'clases/GrupoEmpresas.php';
                       $empresas=new GrupoEmpresa();
                       echo $empresas->dameNombreEmpresa($_SESSION['coduser']);
                 ?>
                 </h3>
                 <input type="hidden" name="nombreGE" value="<?php echo $empresas->dameNombreEmpresa($_SESSION['coduser']); ?>" />
              </div>
              <div class="" id="mensaje">

              </div>
           </div>
        </div>
        <div class="form-group col-lg-11" id="integrantes" >
           <label for="anadir" class="col-lg-2 control-label"><h3 class="h2">Formulario Registros Integrantes</h3></label>
           <div class="col-lg-4" >
              <button id="anadir" type="button" class="btn btn-primary" onclick="anadirIntegrantes();">anadir integrante + </button>
           </div><br/><br/>
           <div class="col-lg-7 container container-fluid" id="cantidadIntegrantes" >
              <?php include 'php/formularios.php'; ?>
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-10">
              <button type="submit" id="btnRegistrar" class="btn btn-primary navbar-right">Registrar</button>
           </div>
        </div>
      </form>
   </div>
      <?php
   }
   if (isset($_REQUEST[md5('registroEmpresa')])||(isset($_REQUEST[md5('errorNombreGrupoEmpresa')]))) {
     ?>
     <div class="well-lg container">
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
        <form action="php/validarNombreGE.php" method="POST" id="formularioRegistroGE" enctype="multipart/form-data">
           <div class="form-horizontal">
             <div class="form-group">
                <label for="nombreGE" class="col-lg-3 control-label " >Nombre para la Grupo Empresa</label>
                <div class="col-lg-3">
                   <input type="text" class="form-control input-sm" id="nombreGE" name="nombreGE" placeholder="nombre grupo empresa" required="true">
                </div>
             </div>
              <div class="form-group">
                <label for="logo" class="col-lg-2 control-label">subir logo</label>
                <div class="col-lg-6">
                   <input type="file" id="logoin" value="imagen" name="logo" class="btn btn-primary" title="subir logo"/>
                   <img id="logoimg" src="img/defecto.png" class="img-thumbnail img-rounded col-sm-5"/>
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
          <?php
             if ($error) {
                ?>
                <div class='alert alert-danger col-lg-11'>
                  Por normas de registro en la grupoempresaTIS usted debe registrar un nombre para su grupo empresa que no 
                  este registrado
                  en los registros existentes en la fundaempresaTIS para consultar empresas existentes haga click
                  <?php echo '<a href="index.php?'.md5("consultaNombreEmpresas").'" class="btn btn-link" >Aqui</a>'; ?>
                </div>
                <?php
             }
             else{
                ?>
                <div class='alert alert-warning col-lg-11'>
                   Por normas de registro en la grupoempresaTIS usted debe registrar un nombre para su grupo empresa que no 
                   este registrado
                   en los registros existentes en la fundaempresaTIS para consultar empresas existentes haga click
                   <?php echo '<a href="index.php?'.md5("consultaNombreEmpresas").'" class="btn btn-link" >Aqui</a>'; ?>
                </div>
                <?php
             }
          ?>
        </div>
     </div>
     <?php
   }
   ?>
</div>