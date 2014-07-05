<?php
    
    include '../clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $codArch= $_POST['codigoArch'];
    $codEmp = $_POST['codEmp'];
    $nota = $_POST['nota'];
    if ($nota > 0 && $nota < 101) {
        $conex->insertarEvaluacionGrupal($codEmp, $codArch, $nota);
        echo  '<div class="alert alert-success">
                  Evaluacion realizada con exito...
               </div>';
    }  else {
        echo  '<div class="alert alert-danger">
                  Fallo en la evaluacion intente de nuevo...
               </div>';
    }
?>
