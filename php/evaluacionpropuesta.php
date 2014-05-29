
<?php
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
?>
    <h2>Publicacion De Propuestas De La Empresa</h2>
    <div>
       <div class="container container-fluid">
           <div class="">
            <?php
            if ($gest->verificarLimiteEntregaDocumentos($_SESSION['coduser'])=='t') {
               $codConv=$gest->obtenerCodigoConvocatoriaLimiteEntreDoc($_SESSION['coduser']);
               $gest->dameTodoDocumentoSubida($codConv);
            }
            else{
            ?>
               <div class="alert alert-danger">
                  Lo sentimos la fecha limite de la entrega documentos ya expiro !!!<br/>
                  el ultimo dia de entrega de documentos fue
                  <?php echo  "<strong class='h4'>".($gest->obtenerFechaLimiteDocumentos($_SESSION['coduser']))."</strong>"; ?>
                  <br/><br/><br/><br/>
               </div>
            <?php
            }
            ?>
           </div>
        </div>
       
    </div>