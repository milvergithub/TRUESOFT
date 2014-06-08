<?php
    //include 'clases/ConexionTIS';
    $BaseDato=pg_connect("host=localhost port=5432 dbname=bdtis user=postgres password=postgres")
            or die ('Error de conexión. Póngase en contacto con el administrador');
    
    $hora = $_POST['hora'];
    $codi = $_POST['cod'];
    $dia = $_POST['dia'];
    pg_query("update horario set hora_hora='".$hora."'where cod_hora='".$codi."'");
    echo "la hora ha sido cambiado a : ".$hora;
    pg_query("update horario set dia_hora='".$dia."'where cod_hora='".$codi."'");
    echo "el dia ha sido cambiado a : ".$dia;
?>