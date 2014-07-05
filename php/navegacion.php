<!--Barra de Navegacion-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
     <span class="sr-only">Cambiar Navegacion</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     </button>
     <a href="index.php" class="navbar-brand"><b>TIS</b></a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
     <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php"><span class="glyphicon glyphicon-home h3"></span> Home</a></li>
        <li class="divider"></li>
        <li class="dropdown"><!--Menu grupo empresas-->
           <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list h3"></span> Grupo Empresas<b class="caret"></b></a>
         <ul class="dropdown-menu">
            <?php
            echo '<li><a href="index.php?'.md5("consultaNombreEmpresas").'"><span class="glyphicon glyphicon-search"></span> buscar nombre empresas</a></li>';
            echo '<li><a href="index.php?'.md5("consultaNombreEmpresas").'"><span class="glyphicon glyphicon-download"></span> bajar archivos convocatoria</a></li>';
            if ($_SESSION['coduser']!=NULL) {
               if ($_SESSION['nombreRol']=="administrador") {
                  echo '<li><a href="index.php?registrodocentes"><span class="glyphicon glyphicon-registration-mark"></span> Registrar docente</a></li>';
                  echo '<li><a href="index.php?creardocumentolectura"><span class="glyphicon glyphicon-list-alt"></span> Crear documento lectura</a></li>';
                  echo '<li><a href="index.php?creardocumentoentrega"><span class="glyphicon glyphicon-list-alt"></span> Crear documento entrega</a></li>';
                  echo '<li><a href="index.php?crearconv"><span class="glyphicon glyphicon-plus"></span> Crear Convocatoria</a></li>';
                  echo '<li><a href="index.php?creargrupo"><span class="glyphicon glyphicon-th"></span> Crear grupo docente</a></li>';
                  echo '<li><a href="index.php?chat"><span class="glyphicon glyphicon-comment"></span> Abrir chat</a></li>';
                  echo '<li class="divider"></li>';
               }
               if ($_SESSION['nombreRol']=="docente") {
                  echo '<li><a href="index.php?seguimiento"><span class="glyphicon glyphicon-random"></span> Seguimiento semanal</a></li>';
                  echo '<li><a href="index.php?evaluararchivos"><span class="glyphicon glyphicon-file"></span> Evaluar Archivos partes</a></li>';
                  echo '<li><a href="index.php?evaluardocumentacion"><span class="glyphicon glyphicon-file"></span> Evaluar Documentacion</a></li>';
                  echo '<li><a href="index.php?chat"><span class="glyphicon glyphicon-comment"></span> Abrir chat</a></li>';
               }
               if ($_SESSION['nombreRol']=="representante") {
                  echo '<li><a href="php/controlEstado.php"><span class="glyphicon glyphicon-registration-mark"></span> registro empresa</a></li>';
                  echo '<li><a href="index.php?propuestas"><span class="glyphicon glyphicon-upload"></span> Subir Propuestas</a></li>';
                  echo '<li><a href="index.php?subirdocumentacion"><span class="glyphicon glyphicon-upload"></span> Subir Documentacion</a></li>';
                  echo '<li><a href="index.php?asistencias"><span class="glyphicon glyphicon-upload"></span> Ver asistencias</a></li>';
                  echo '<li><a href="index.php?vernotas"><span class="glyphicon glyphicon-upload"></span> Ver notas</a></li>';
                  echo '<li><a href="index.php?chat"><span class="glyphicon glyphicon-comment"></span> Abrir chat</a></li>';
               }
            }
            ?>
         </ul>
           
         <li class="dropdown"><!--Menu grupo empresas-->
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog h3"></span> Settings<b class="caret"></b></a>
         <ul class="dropdown-menu">
            <?php
            if ($_SESSION['coduser']!=NULL) {
               if ($_SESSION['nombreRol']=="administrador") {
                  echo '<li><a href="index.php?configuracionadminhoradocente"><span class="glyphicon glyphicon-wrench"></span> Configuraciones</a></li>';
               }
               if ($_SESSION['nombreRol']=="docente") {
                  echo '<li><a href="index.php?configuraciondoc"><span class="glyphicon glyphicon-cog"></span> Configuracion</a></li>';
                  echo '<li><a href="index.php?configuraciondocum"><span class="glyphicon glyphicon-cog"></span> Configuracion documentos</a></li>';
                  echo '<li><a href="index.php?configuracionsemestral"><span class="glyphicon glyphicon-cog"></span> Configuracion semestral</a></li>';
               }
               if ($_SESSION['nombreRol']=="representante") {
               }
            }
            ?>
         </ul>
        </li>
        </li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
        <?php  
         if ($_SESSION['coduser']!=NULL){
            echo '<li><a ><span class="glyphicon glyphicon-hand-right h3" style="color: cyan"></span> <b style="color: cyan">'.$_SESSION['nombreRol'].'</b></a></li>';
            echo '<li><a ><span class="glyphicon glyphicon-user h3"></span>  '.$_SESSION['nombreUsuario'].'</a></li>';
            echo '<li><a href="php/salir.php">LoginOut <span class="glyphicon glyphicon-log-out h3"></span>&#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
         else{
            echo '<li><a href="index.php?'.md5("registro").'"><span class="glyphicon glyphicon-registration-mark h3"></span> Registro</a></li>'; 
            echo '<li><a href="" data-toggle="modal" data-target="#basicModal">LoginIn <span class="glyphicon glyphicon-log-in h3"></span> &#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
        ?>
     </ul>
  </div>
</nav><br><br><br><br/><br/>
