<?php
include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codConv = 1;
?>

    <h2>
        ASIGNACION DE PUNTOS A CADA DOCUMENTO
    </h2>
<div>
    <div class="container container-fluid">
           <div class="">
            <?php 
                $gestion->darDocumentosConfiguracion($codConv, $_SESSION['coduser']);
            ?>
           </div>
        </div>
</div>
