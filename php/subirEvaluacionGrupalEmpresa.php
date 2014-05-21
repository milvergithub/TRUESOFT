<?php
    
    include 'clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $codArch= $_POST['codigoArch'];
    $codEmp = $_POST['codEmp'];
    $nota = $_POST['nota'];
    echo 'codigo archivo es: '.$codArch.'<br>';
    echo 'codigo empresa es: '.$codEmp.'<br>';
    echo 'la nota es: '.$nota.'<br>';
    
    if ($nota > 0 && $nota < 101) {
        $conex->insertarEvaluacionGrupal($codEmp, $codArch, $nota);
        echo 'Evaluacion realizada con exito...';
    }  else {
        echo 'Fallo en la evaluacion intente de nuevo...';
    }
?>

<br>    
<a href="evaluacionGrupalEmpresa.php">Volver atras</a>
