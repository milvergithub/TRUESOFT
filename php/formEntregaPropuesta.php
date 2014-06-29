<?php
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
?>
<div class="container container-fluid panel panelaso"><br/>
   <div class="panel titulo"><h2>Publicacion De Propuestas De La Empresa</h2></div>  
   <?php
     if ($gest->verificarLimiteEntregaPropuesta($_SESSION['coduser'])=='t') {
        $codConv=$gest->obtenerCodigoConvocatoriaLimiteEntreDoc($_SESSION['coduser']);
        $gest->dameTodoDocumentoSubida($codConv);
     }
     else{
     ?>
        <div class="alert alert-danger">
           Lo sentimos la fecha limite de la entrega documentos ya expiro !!!<br/>
           el ultimo dia de entrega de documentos fue
           <?php echo  "<strong class='h4'>".($gest->obtenerFechaLimiteDocumentos($_SESSION['coduser']))."</strong>"; ?>
           O usted no tiene registrada su grupo empresa...
           <br/><br/><br/><br/>
        </div>
     <?php
     }
     ?>
 </div>