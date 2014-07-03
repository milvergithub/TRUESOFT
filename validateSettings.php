<?php
include './clases/ConexionTIS.php';
$conexionSetting=new ConexionTIS();

echo "nombre".$_POST['nombres']."<br/>";
echo "cuenta".$_POST['cuenta']."<br/>";
echo "password".$_POST['pass']."<br/>";
$conexionSetting->settingsAdmin($_POST['cuenta'], $_POST['pass'], $_POST['nombres']);
?>
