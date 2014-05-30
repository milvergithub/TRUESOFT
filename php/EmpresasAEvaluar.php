<?php
include 'clases/Evaluaciones.php';
$eval=new Evaluaciones();
?>
<div class="container container-fluid">
    <div class="row">
<?php
$codGrupo=$eval->dameCodigoGrupoQueSoy($_SESSION['coduser']);
$eval->ImprimirEmpresasAEvaluarArchivos($codGrupo);
?>   
    </div>
</div>
