<?php
    $BaseDato=pg_connect("host=localhost port=5432 dbname=bdtis user=postgres password=postgres")
           or die ('Error de conexión. Póngase en contacto con el administrador');
   // include 'clases/ConexionTIS.php';
    
    $esta = $_POST['estado'];
    $nombDoc=$_POST['nombre'];
    echo $esta;
    echo $nombDoc;
    if ($esta=='habilitado') {
        $esta='FALSE';
       pg_query("update usuario set estado_usuario='".$esta."'where nombre_usuario='".$nombDoc."'");
    }  else {
        $esta='TRUE';
       pg_query("update usuario set estado_usuario='".$esta."'where nombre_usuario='".$nombDoc."'");
    }
?>
