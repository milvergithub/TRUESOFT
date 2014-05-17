<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<?php
        include 'clases/ConexionTIS.php';
        $conex = new ConexionTIS();
        
	$nombre=$_POST['nombreconv'];
	$fecha=$_POST['fecha'];
	echo 'el nombre de la convocatoria es :'.$nombre."<br>";
	echo 'la fecha de cracion es:'.$fecha."<br>";
        $fechaActual= $conex->getFechaActual();
        //echo 'la fecha actual es:'.$fechaActual[0].'<br>';
        $fechaInsert = date("Y-m-d", strtotime($fecha));
        $nvoNomb = trim($nombre);
        if ($nvoNomb == '') {
            echo 'el nombre la convocatoria no puede ser nulo <br>';
        }
        else {
            if ($fechaInsert == '' || $fechaInsert < $fechaActual[0]) {
            echo 'la fecha de la convocatoria no puede ser nula o menor a la actual <br>';
            }
            else {
                $conex->insertarConvocatoria($nombre, $fechaInsert);
                echo 'convocatoria creada correctamente';
            }
        }
        
	?>
    <br>    
    <a href="crearConvocatoria.php">Volver atras</a>
    
</body>
</html>