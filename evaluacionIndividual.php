<?php
include 'php/head.php';
include 'clases/Evaluaciones.php';
$evalInd=new Evaluaciones();
?>
<h3 class="h3">Evaluacion Individual</h3>
<div class="table-responsive">
   <table class="table table-bordered table-hover">
      <caption class="caption panel-heading h3">Evaluacion Individual</caption>
      <?php $evalInd->imprimirEvaluacionPersonal(4) ?>
   </table>
</div>