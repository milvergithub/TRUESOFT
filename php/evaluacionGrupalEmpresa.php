<?php
    include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp =$_POST['codEmp'];    
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