<?php
session_start();
include '../clases/Chat.php';
$chatear=new Chat();
$chatear->obtenerMensajesActuales($_SESSION['coduser']);
?>
