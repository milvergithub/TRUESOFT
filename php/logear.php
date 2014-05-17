<?php
session_start();
include '../clases/Acceso.php';
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$acceso=new Acceso($usuario, $pass);
if ($acceso->existeUsuario()) {
    $_SESSION['coduser']=$acceso->getCodUsuario();
    $_SESSION['nombreUsuario']=$acceso->getNombreUsuario($acceso->getCodUsuario());
    echo '<script type="text/javascript">
            window.location="../index.php";
          </script>';
}
else{
    echo 'usuario es :'.$usuario."<br>";
    echo 'password es :'.$pass."<br>";
    echo 'no existe';
    echo '<script type="text/javascript">
            window.location="../index.php?'.md5('errorlogin').'";
          </script>';
}

?>
