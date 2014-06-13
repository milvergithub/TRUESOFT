<?php
    include 'php/head.php';
    include './clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp = 1;    
?>
<h2>Evaluacion De Documentacion De La Empresa</h2>
    
    <div>
        <div class="container container-fluid">
               <div class="">
                <?php 
                    $gestion->devolverArchivoEmpresaDocumentacion($codEmp);
                ?>
               </div>
        </div>
    </div>

