<?php
include 'clases/Evaluaciones.php';
$eval=new Evaluaciones();
?>
<div class="container container-fluid panel panel-default">
    <div class="panel panel-success">
       <h3><b>Evaluacion de archivos subidos por cada grupo empresa</b></h3>
<?php
$codGrupo=$eval->dameCodigoGrupoQueSoy($_SESSION['coduser']);
$eval->ImprimirEmpresasAEvaluarArchivos($codGrupo);
?>   
    </div>
</div>
