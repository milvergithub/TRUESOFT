<?php
    include '../clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $coddoc= $_POST['codigoDoc'];
    $codTip= $_POST['codigoTip'];
    $nota=$_POST['nota'];
    $codUsu= $_POST['codigoUsuario'];
    if ($nota > 0 && $nota < 101) {
        $conex->configuracionNotasDocumento($codUsu, $coddoc, $nota);
        echo '<div class="alert alert-success">
                  configuracion realizada con exito...
              </div>';
    }  else {
        echo '<div class="alert alert-danger">
                fallo en la configuracion vuelva a interntarlo
              </div>';
    }
?>


