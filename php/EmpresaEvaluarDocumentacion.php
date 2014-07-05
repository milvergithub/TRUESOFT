<?php
session_start();
include './clases/Evaluaciones.php';
$eval=new Evaluaciones();
?>
<div class="container-fluid panel panel-default">
   <div class="panel titulo">
      <h3><b>Evaluacion de documentacion subido por cada grupo empresa</b></h3>
   </div>
    <div class="panel">
<?php
//$_SESSION['coduser']
$codGrupo=$eval->dameCodigoGrupoQueSoy($_SESSION['coduser']);
$eval->ImprimirEmpresasAEvaluarDocumentacion($codGrupo);
?>   
    </div>
</div>
