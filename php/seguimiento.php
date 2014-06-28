<?php
session_start();
include 'clases/GrupoEmpresas.php';
$emp=new GrupoEmpresa();
?>
<div  class="page-header" id="banner">
     <h1><?php echo $emp->getNombreDocente($_SESSION['coduser'])?></h1>
     <h2>Gestion CPTIS012014</h2>
     <h3><?php echo $emp->getFecha(); ?></h3>
     <h4><?php echo $emp->getRolUsuario($_SESSION['coduser']);?></h4>
 </div>
<section id="contenido" class="container">
 <?php
    $emp->getGrupoEmpresas($_SESSION['coduser']);
 ?>
</section>
