<?php
    include 'clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $coddoc= $_POST['codigoDoc'];
    $codTip= $_POST['codigoTip'];
    $nota=$_POST['nota'];
    $codUsu= $_POST['codigoUsuario'];
    echo "nota=".$nota.'<br>';
    echo "codigo doc=".$coddoc.'<br>';
    echo "codigo tip=".$codTip.'<br>';
    echo 'codigo usuario:'.$codUsu.'<br>';
    
    if ($nota > 0 && $nota < 101) {
        $conex->configuracionNotasDocumento($codUsu, $coddoc, $nota);
        echo 'configuracion realizada con exito...';
    }  else {
        echo 'fallo en la configuracion vuelva a interntarlo';
    }
?>
<br>    
<a href="configurarDocumentos.php">Volver atras</a>

