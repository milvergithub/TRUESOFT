<?php
include 'clases/ConexionTIS.php';
$conexND=new ConexionTIS();
$resultadoDNMD=$conexND->dameNombreDocenteMiGrupo($_SESSION['coduser']);
echo '<option value="">seleccione su grupo</option>';
while ($regDNMG = pg_fetch_assoc($resultadoDNMD)) {
   echo "<option value='".$regDNMG['codgrupo']."'>".$regDNMG['nombredocente']."</option>";
}
?>

