<?php
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
?>
<h2>Publicacion De Documentacion De La Empresa</h2>
<div>
   <div class="container container-fluid">
       <div class="">
        <?php
        if ($gest->verificarLimiteEntregaDocumentos($_SESSION['coduser'])=='t') {
           $codConv=$gest->obtenerCodigoConvocatoriaLimiteEntreDoc($_SESSION['coduser']);
           $gest->dameDocumentosDocumentacionEntrega($codConv);
        }
        else{
        ?>
           <div class="alert alert-danger">
              Lo sentimos la fecha limite de la entrega documentos ya expiro !!!<br/>
              el ultimo dia de entrega de documentos fue
              <?php echo  "<strong class='h4'>".($gest->dameFechaLimiteDocumentacion($_SESSION['coduser']))."</strong>"; ?>
              O usted no tiene registrada su grupo empresa...
              <br/><br/><br/><br/>
           </div>
        <?php
        }
        ?>
       </div>
    </div>

</div>