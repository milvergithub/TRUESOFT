<?php
   include '../clases/RegistroTIS.php';
    $username = $_POST["nombreuser"];
	$name = $_POST["nombres"];
	$lname = $_POST["apellidos"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	$email = $_POST["email"];
	$telf = $_POST["telefono"];
	$nroGrupo = $_POST["grupo"];
	
    $nombreCompl = $name." ".$lname;

	// Hay campos en blanco 
	if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL | $telf == NULL) {
		echo "Hay Campos Vacios";
		echo '<script type="text/javascript">
               window.location="../index.php?'.md5("registrocamposvacios").'";
              </script>';
	}
    else{
		// &iquest;Coinciden las contrase&ntilde;as?
		if($password!=$cpassword) {
			echo "Las Contrase&ntilde;as No Coinciden";
			echo '<script type="text/javascript">
                     window.location="../index.php?'.md5("registrocontrasenasdiferentes").'";
                  </script>';
        }
    }
    
    $registroRep=new RegistroTIS();
    if ($registroRep->usuarioUnico($username)=='t') {
       if ($registroRep->emailUnico($email)=='t') {
          echo "usuario = ".$username."<br>";
          echo "nombres = ".$nombreCompl."<br>";
          echo "password = ".$password."<br>";
          echo "email = ".$email."<br>";
          echo "telefono = ".$telf."<br>";
          echo "grupo = ".$nroGrupo."<br>";
          $connec=new ConexionTIS();
          $connec->registrarUsuarioRepresentante($nroGrupo, $username, $password, $nombreCompl,$telf,$email);
          echo '<script type="text/javascript">
                  window.location="../index.php";
                </script>';
       }
       else{
          echo '<script type="text/javascript">
                  window.location="../index.php?'.md5("emailExiste").'";
                </script>';
       }
    }
    else{
       echo '<script type="text/javascript">
               window.location="../index.php?'.md5("registroUsuarioExiste").'";
             </script>';
    }
?>