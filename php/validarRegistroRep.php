<?php
   include '../clases/RegistroTIS.php';
    $username = $_POST["nombreuser"];
	$name = $_POST["nombres"];
	$lname = $_POST["apellidos"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$telf = $_POST["telefono"];
	$nroGrupo = $_POST["grupo"];
	if (trim($telf)==NULL) {
       $telf=0;
    }
    if (trim($email)==NULL) {
       $email="*";
    }
    $nombreCompl = $name." ".$lname;
    $registroRep=new RegistroTIS();
    if ($registroRep->usuarioUnico($username)=='t') {
       if ($registroRep->emailUnico($email)=='t') {
          $connec=new ConexionTIS();
          $connec->registrarUsuarioRepresentante($nroGrupo, $username, $password, $nombreCompl,$telf,$email);
           echo "<div class='alert alert-success col-lg-8'>
                    El usuario se creo exitosamente
                    <h5>Bienvenido".$username."</h5>Haga click para <a href='' class='btn btn-link' data-toggle='modal' data-target='#basicModal'>Iniciar sesion</a></div>";
       }
       else{
          echo "<div class='alert alert-danger col-lg-8'>
                    Email ya Existe !!!
                </div>";
       }
    }
    else{
       echo '<div class="alert alert-danger col-lg-8">
                El usuario ya Existe !!!
             </div>';
    }
?>