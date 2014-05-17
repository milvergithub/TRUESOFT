<?php
require 'clases/ConexionTIS.php';
//cantidad de registros a llenar
$cantidad=$_POST['cantidad'];

$codIntegrantes;
$asistentes;
$licencia;
$participacion;
$justificacion;
$nota;
$observacion;

//llenamos codigos integrantes
for ($ci = 0; $ci < $cantidad; $ci++) {
   $codIntegrantes[$ci]=$_POST['codint'.($ci+1)];
}

//llenamos asistencias
for ($x = 0; $x < $cantidad; $x++) {
    if($_POST['asistencia'.($x+1)]==NULL){
        $asistentes[$x]=0;
    }
    else{
        $asistentes[$x]=1;
    }
}
//llenamos licencias
for ($z = 0; $z < $cantidad; $z++) {
    if($_POST['licencia'.($z+1)]==NULL){
        $licencia[$z]=0;
    }
    else{
        $licencia[$z]=1;
    }
}
//lenado de participacion
for ($p = 0; $p < $cantidad; $p++) {
    if($_POST['participacion'.($p+1)]==NULL){
        $participacion[$p]=0;
    }
    else{
        $participacion[$p]=1;
    }
}
//llenado de justificacion
for($ll=0;$ll<$cantidad;$ll++){
    if($_POST['justificacion'.($ll+1)]==NULL){
        $justificacion[$ll]='';
    }
    else{
        $justificacion[$ll]=$_POST['justificacion'.($ll+1)];
    }
}
//llenado de nota
for($n=0;$n<$cantidad;$n++){
    if($_POST['nota'.($n+1)]==NULL){
        $nota[$n]=0;
    }
    else{
        $nota[$n]=$_POST['nota'.($n+1)];
    }
}
//llenado de observacion
for($o=0;$o<$cantidad;$o++){
    if($_POST['obs'.($o+1)]==NULL){
        $observacion[$o]='';
    }
    else{
        $observacion[$o]=$_POST['obs'.($o+1)];
    }
}
$conx=new ConexionTIS();
                       //( codint        , asist     , lic     , justf        , part         , nt  , obs)
$conx->evaluarIntegrantes($codIntegrantes,$asistentes,$licencia,$participacion,$justificacion,$nota,$observacion,$cantidad,$_POST['codEmp']);

header("Location:seguimiento.php");



echo $cantidad."<br>";
/**/?>
