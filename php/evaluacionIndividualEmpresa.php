<?php
include 'clases/Evaluaciones.php';
$evalInd=new Evaluaciones();
?>
<h3 class="h3">Evaluacion Individual</h3>
<div class="mensajeNota">
Nota=      
</div>
<div class="table-responsive">
   <table class="table table-bordered table-hover table-condensed table-striped panel-primary">
      <caption class="caption panel-heading h3">Evaluacion Individual</caption>
      <?php 
         echo "codEmp=".$_POST['codEmp'];
         echo "codUser=".$_SESSION['coduser']; 
         $evalInd->imprimirEvaluacionPersonal($_POST['codEmp']) 
      ?>
   </table>
</div>