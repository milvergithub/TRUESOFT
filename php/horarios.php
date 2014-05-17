<?php
//codpresnt, horapres, hora    $_POST['codDia']
include '../clases/ConexionTIS.php';
$conexhp=new ConexionTIS();
$resultadoDHP=$conexhp->dameHorasPresentacion($_POST['codDia']);
$resultadoHPT=$conexhp->dameHorasPresentacionTotal($_POST['codDia']);
$resultadoDHPAUX=$conexhp->dameHorasPresentacion($_POST['codDia']);
while ($regHPT = pg_fetch_assoc($resultadoHPT)) {
   $cantidadHPT=$regHPT['contarh'];
}

if ($cantidadHPT>0) {
   $horasPresentacion=array();

   $horaFormateada=array();//todo horario formateado

   while ($regDHP = pg_fetch_assoc($resultadoDHP)) {
      array_push($horasPresentacion, $regDHP['horapres']);
      $horario=$regDHP['hora'];
   }
   $horaMinutosSegundo= explode(":", $horario);

   $incremento=90/$cantidadHPT;

   $cont=0;
   while ($cont<$cantidadHPT) {
      array_push($horaFormateada, $cont);
      $cont=$cont+1;
   }

   $contadorHora=0;
   while (($regDHPAUX = pg_fetch_assoc($resultadoDHPAUX))) {
      echo "<option value='".$regDHPAUX['codpresnt']."'>".(dameFormato(($horasPresentacion[$contadorHora]-1),((int)$horaMinutosSegundo[0]), ((int)$horaMinutosSegundo[1]), $incremento))."</option>";
      $contadorHora=$contadorHora+1;
   }
}
 else {
      echo "<option value'-1'>no se actualizo horario</option>";
 }

function dameFormato($conta,$hora,$minuto,$increm) {
   $minutos=($minuto+$increm*$conta);
   $horaReal=$hora;
   if ($minutos>=60) {
      $horaReal=((int)$horaReal+((int)($minutos/60)));
      $minutos=$minutos%60;
   }
   if ($horaReal<10) {
      $cadenaHora="0".$horaReal;
   }
   else{
      $cadenaHora=$horaReal;
   }
   
   if ($minutos<10) {
      $cadenaMinuto="0".$minutos;
   }
   else{
      $cadenaMinuto=$minutos;
   }
   return $cadenaHora.":".$cadenaMinuto;
}

?>

