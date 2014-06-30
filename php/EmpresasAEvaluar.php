<?php
include 'clases/Evaluaciones.php';
$eval=new Evaluaciones();
?>
<div class="container-fluid panel panel-default">
   <div class="panel titulo">
      <h3><b>Evaluacion de archivos subidos por cada grupo empresa</b></h3>
   </div>
    <div class="panel">
<?php
$codGrupo=$eval->dameCodigoGrupoQueSoy($_SESSION['coduser']);
$eval->ImprimirEmpresasAEvaluarArchivos($codGrupo);
?>   
    </div>
</div>
