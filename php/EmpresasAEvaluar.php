<?php
include 'clases/Evaluaciones.php';
$eval=new Evaluaciones();
?>
<div class="container container-fluid">
    <div class="row">
<?php
$eval->ImprimirEmpresasAEvaluarArchivos(1);
?>   
    </div>
</div>
