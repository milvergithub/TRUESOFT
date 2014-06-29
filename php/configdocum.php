<?php
include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codc=$gestion->dameUltimaConvocatoria();
?>
<div class="panel col-lg-12 panelaso">
   <div class="panel subtitulo col-lg-12">
      <h2>
       <b>Asignacion de puntos a cada documento de propuesta(parte A, parte B)</b>
      </h2>
   </div>
   <div class=" container container-fluid panel panel-default col-lg-12">
           <div class="">
            <?php 
                $gestion->darDocumentosConfiguracion($codc, $_SESSION['coduser']);
            ?>
           </div>
        </div>
</div>
