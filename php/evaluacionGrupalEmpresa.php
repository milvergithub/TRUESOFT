<?php
    include 'clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp =$_POST['codEmp'];
?>
<h2 class="panel titulo">Evaluacion Grupal De La Empresa</h2>   
<div class="container container-fluid panel">
   <div id="mensajeEvaluacionGrupal" class="panel"></div>
       <div class="panel">
        <?php 
            $gestion->devolverArchivoEmpresa($codEmp);
        ?>
       </div>
</div>