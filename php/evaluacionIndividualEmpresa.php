<?php
include 'clases/Evaluaciones.php';
$evalInd=new Evaluaciones();
?>
<div class="mensajeNota">
</div>
<div class="table-responsive">
   <div id="mensajeEvaluacionIndividual"></div>
   <table class="table table-bordered table-hover table-condensed table-striped panel-primary">
      <caption class="caption titulo h2 panel">Evaluacion Individual</caption>
      <?php  
         $evalInd->imprimirEvaluacionPersonal($_POST['codEmp']) 
      ?>
   </table>
</div>