<?php
    include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp =$_POST['codEmp'];    
?>
<h2 class="panel titulo">Evaluacion Grupal De La Empresa</h2>   
<div class="container container-fluid">
   <div id="mensajeEvaluacionGrupal"></div>
       <div class="">
        <?php 
            $gestion->devolverArchivoEmpresa($codEmp);
        ?>
       </div>
</div>