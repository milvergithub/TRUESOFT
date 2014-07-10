<?php
include '../clases/ConexionTIS.php';
switch ($_POST['categoria']){
   case 'convocatoria':
      imprimirConvocatorias();
      break;
   case 'gestion':
      imprimirGestion();
      break;
   case 'tipodocumento':
      imprimirTipoDocumentos();
      break;
   default:
      break;
}
function imprimirGestion() {
   $conexion=new ConexionTIS();
   $resultado=$conexion->Consultas("SELECT cod_gest AS codigo,gestion_gest AS gestion FROM gestion");
   while ($reg = pg_fetch_assoc($resultado)) {
      echo '<option value="'.$reg['codigo'].'">'.$reg['gestion'].'</option>';
   }
}
function imprimirConvocatorias() {
   $conexion=new ConexionTIS();
   $resultado=$conexion->Consultas("SELECT cod_conv AS codigo, nombre_conv AS nombre FROM convocatoria");
   while ($reg = pg_fetch_assoc($resultado)) {
      echo '<option value="'.$reg['codigo'].'">'.$reg['nombre'].'</option>';
   }
}
function imprimirTipoDocumentos() {
   $conexion=new ConexionTIS();
   $resultado=$conexion->Consultas("SELECT nombre_tipo AS nombre,cod_tipo AS tipo FROM tipo_documento");
   while ($reg = pg_fetch_assoc($resultado)) {
      echo '<option value="'.$reg['tipo'].'">'.$reg['nombre'].'</option>';
   }
}
?>

