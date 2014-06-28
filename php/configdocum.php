<?php
include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codc=$gestion->dameUltimaConvocatoria();
?>

    <h2>
       <b>Asignacion de puntos a cada documento de propuesta(parte A, parte B)</b>
    </h2>
<div>
    <div class=" container container-fluid panel panel-default">
           <div class="">
            <?php 
                $gestion->darDocumentosConfiguracion($codc, $_SESSION['coduser']);
            ?>
           </div>
        </div>
</div>
