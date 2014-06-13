<?php
    include '../clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    $codGrup = $_POST['codgrupo'];
    $conex->eliminarGrupo($codGrup);
    echo '<script type="text/javascript">
            window.location="../index.php?creargrupo";
          </script>';
?>