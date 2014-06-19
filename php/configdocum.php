<?php
include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codc=$gestion->dameUltimaConvocatoria();
?>

    <h2>
        ASIGNACION DE PUNTOS A CADA DOCUMENTO
    </h2>
<div>
    <div class="container container-fluid">
           <div class="">
            <?php 
                $gestion->darDocumentosConfiguracion($codc, $_SESSION['coduser']);
            ?>
           </div>
        </div>
</div>
