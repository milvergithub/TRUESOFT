<?php
session_start();
include '../clases/Chat.php';
$chatear=new Chat();
$chatear->enviarMensajeChat($_SESSION['coduser'], $_POST['mensaje']);
$chatear->obtenerMensajesActuales($_SESSION['coduser']);
?>