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
        <li><a href="index.php" class="btn">Inicio</a></li>
        <?php
        echo '<li><a href="index.php?'.md5("consultaNombreEmpresas").'" class="btn">buscar</a></li>';
        
        if ($_SESSION['coduser']!=NULL) {
           echo '<li><a href="php/controlEstado.php" class="btn">registro</a></li>';
           echo '<li><a href="seguimiento.php" class="btn">seguimiento</a></li>';
           echo '<li><a href="index.php?'.md5("evaluarEmpresaArchivos").'" class="btn">Evaluar Archivos</a></li>';
        }
        ?>
     </ul>
     <ul class="nav navbar-nav navbar-right">
        <?php  
         if ($_SESSION['coduser']!=NULL){
            echo '<li><a class="btn"><span class="glyphicon glyphicon-user"> '.$_SESSION['nombreUsuario'].'</span></a></li>'; 
            echo '<li><a href="php/salir.php" class="btn">LoginOut <span class="glyphicon glyphicon-log-out"></span>&#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
         else{
            echo '<li><a href="index.php?'.md5("registro").'" class="btn"Libros>Registro&#32;&#32;&#32;</a></li>'; 
            echo '<li><a href="" class="btn" data-toggle="modal" data-target="#basicModal">LoginIn <span class="glyphicon glyphicon-log-in"></span> &#x02007;&#x02007;&#x02007;&#8199;</a></li>';
         }
        ?>
     </ul>
  </div>
</nav><br><br><br>
