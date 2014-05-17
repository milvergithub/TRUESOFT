<?php
session_start();
    include 'clases/GrupoEmpresas.php';
    $emp=new GrupoEmpresa();
    if(isset($_GET['codEmp'])||isset($_REQUEST[md5("codEmpH")])){
       $atras=TRUE;
    }
?>
<!DOCTYPE html>
<html>
    <?php 
      include 'php/head.php';
      ?>
      <link href="css/base.css" rel="stylesheet">
      <?php
    ?>
    <body>
           <!--Barra de Navegacion-->
           <nav class="navbar navbar-default navbar-fixed-top" id="bannerUP">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Cambiar Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/logos/logo2.jpg" class="img-circle" id="grupo-Min"/></div>

                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav"><br/>&nbsp;&nbsp;&nbsp;
                           <a href="index.php" class="btn btn-info">Inicio</a>&nbsp;&nbsp;&nbsp;
                            <a href="index.php" class="btn btn-info">Cerrar sesion</a>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!--<li><a href="#">Eventos</a></li>-->
                            <br>
                            <?php if ($atras) {
                              echo '<a href="seguimiento.php" class="btn btn-info">ir atras</a>';
                            }
                            ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </ul>
                    </div>

            </nav>
           <br/><br/><br/>
           <div  class="page-header" id="banner">
                <h1><?php echo $emp->getNombreDocente($_SESSION['coduser'])?></h1>
                <h2>Gestion CPTIS012014</h2>
                <h3><?php echo $emp->getFecha(); ?></h3>
                <h4><?php echo $emp->getRolUsuario($_SESSION['coduser']);?></h4>
            </div>
        <section id="contenido" class="container">
            <?php
            if (isset($_REQUEST[md5("codEmpH")])) {
               include 'historialseguimiento.php';
            }
            else{
               if(isset($_GET[md5("codEmp")])){
                include 'evaluarEmpresa.php';
               }
               else {
                   $emp->getGrupoEmpresas($_SESSION['coduser']);
               }
            }
            ?>
        </section>
       <?php
            include 'php/footer.php';
       ?>
    </body>
    
</html>
