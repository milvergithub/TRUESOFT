<?php
    include 'php/head.php';
    include './clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp = 1;    
?>
<h2>Evaluacion Grupal De La Empresa</h2>
    
    <div>
        <div class="container container-fluid">
               <div class="">
                <?php 
                    $gestion->devolverArchivoEmpresa($codEmp);
                ?>
               </div>
        </div>
    </div>