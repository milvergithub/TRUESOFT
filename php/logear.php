<?php
session_start();
include '../clases/Acceso.php';
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$acceso=new Acceso($usuario, $pass);
if ($acceso->existeUsuario()) {
    $_SESSION['coduser']=$acceso->getCodUsuario();
    $_SESSION['nombreUsuario']=$acceso->getNombreUsuario($acceso->getCodUsuario());
    $_SESSION['nombreRol']=$acceso->getNombreRol($acceso->getCodUsuario());
    echo '<script type="text/javascript">
            window.location="../index.php";
          </script>';
}
else{
    echo '<script type="text/javascript">
            window.location="../index.php?'.md5('errorlogin').'";
          </script>';
}

?>
