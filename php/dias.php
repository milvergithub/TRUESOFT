<?php
include '../clases/ConexionTIS.php';
$conn=new ConexionTIS();
$resultadoDDC=$conn->dameDiasDeClases($_POST['codGrup']);
while ($regDDC = pg_fetch_assoc($resultadoDDC)) {
   echo "<option value='".$regDDC['codhora']."'>".$regDDC['dia']."</option>";
}
?>

