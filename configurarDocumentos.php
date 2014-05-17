<?php
    include 'php/head.php';
   include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codConv = 2;
    $codUsu = 2;
?>

    <h2>
        ASIGNACION DE PUNTOS A CADA DOCUMENTO
    </h2>
<div>
    <div class="container container-fluid">
           <div class="">
            <?php 
                $gestion->darDocumentosConfiguracion($codConv, $codUsu);
            ?>
           </div>
        </div>
</div>
