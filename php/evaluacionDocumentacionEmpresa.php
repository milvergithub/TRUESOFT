<?php
    include './clases/GestionDocumentos.php';
    
    $gestion = new GestionDocumentos();
    $codEmp = $_POST['codEmp'];    
?>
<div class="panel titulo"><h2>Evaluacion De Documentacion De La Empresa</h2></div>    
<div class="container container-fluid panel">
   <div id="mensajesubidanotadocumentacion"></div>
       <div class="">
        <?php 
            $gestion->devolverArchivoEmpresaDocumentacion($codEmp);
        ?>
       </div>
</div>

