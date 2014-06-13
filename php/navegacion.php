<!--Barra de Navegacion-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
     <span class="sr-only">Cambiar Navegacion</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     </button>
     <a href="index.php" class="navbar-brand">TIS</a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
     <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php"><span class="glyphicon glyphicon-home">Home</span></a></li>
        <li class="divider"></li>
        <li class="dropdown"><!--Menu grupo empresas-->
         <a href="" class="dropdown-toggle" data-toggle="dropdown">Grupo Empresas<b class="caret"></b></a>
         <ul class="dropdown-menu">
            <?php
            echo '<li><a href="index.php?'.md5("consultaNombreEmpresas").'">buscar</a></li>';
            
            if ($_SESSION['coduser']!=NULL) {
               if ($_SESSION['nombreRol']=="administrador") {
                  echo '<li><a href="index.php?registrodocentes">Registrar docente</a></li>';
                  echo '<li><a href="index.php?creardocumentolectura">Crear documento</a></li>';
                  echo '<li><a href="index.php?creardocumentoentrega">Crear entregables</a></li>';
                  echo '<li><a href="index.php?crearconv">Crear Convocatoria</a></li>';
                  echo '<li><a href="index.php?configuracionadmin">configuraciones</a></li>';
                  echo '<li><a href="index.php?creargrupo">crear grupo</a></li>';
                  echo '<li><a href="index.php?chat">Abrir chat</a></li>';
                  echo '<li class="divider"></li>';
               }
               if ($_SESSION['nombreRol']=="docente") {
                  echo '<li><a href="index.php?seguimiento">seguimiento</a></li>';
                  echo '<li><a href="index.php?evaluararchivos">Evaluar Archivos</a></li>';
                  echo '<li><a href="index.php?configuraciondoc">configuracion</a></li>';
                  echo '<li><a href="index.php?configuraciondocum">configuracion documentos</a></li>';
                  echo '<li><a href="index.php?chat">Abrir chat</a></li>';
               }
               if ($_SESSION['nombreRol']=="representante") {
                  echo '<li><a href="php/controlEstado.php">registro empresa</a></li>';
                  echo '<li><a href="index.php?propuestas">Subir Propuestas</a></li>';
                  echo '<li><a href="index.php?subirdocumentacion">Subir Documentacion</a></li>';
                  echo '<li><a href="index.php?chat">Abrir chat</a></li>';
               }
            }
            ?>
         </ul>
        </li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
        <?php  
         if ($_SESSION['coduser']!=NULL){
            echo '<li><a ><span class="glyphicon" style="color: cyan"> '.$_SESSION['nombreRol'].'</span></a></li>';
            echo '<li><a ><span class="glyphicon glyphicon-user"> '.$_SESSION['nombreUsuario'].'</span></a></li>';
            echo '<li><a href="php/salir.php">LoginOut <span class="glyphicon glyphicon-log-out"></span>&#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
         else{
            echo '<li><a href="index.php?'.md5("registro").'">Registro</a></li>'; 
            echo '<li><a href="" data-toggle="modal" data-target="#basicModal">LoginIn <span class="glyphicon glyphicon-log-in"></span> &#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
        ?>
     </ul>
  </div>
</nav><br><br><br>
