<?php
include 'clases/RegistroTIS.php';
$registroGD=new RegistroTIS();
echo '<option value="">Seleccione un grupo</option>';
$registroGD->getGrupoDisponiblesDocente();
?>

