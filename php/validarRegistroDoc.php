<?php
include '../clases/RegistroTIS.php';
   $registroDoc=new RegistroTIS();
   
   $usuariod=$_POST['nombreuser'];
   $nombresDoc=$_POST['nombres'];
   $apellidosDoc=$_POST['apellidos'];
   $grupo=$_POST['nrogrupo'];
   $pass=$_POST['password'];
   $emailDoc=$_POST['emailDoc'];
   $telefono=$_POST['telefono'];
   
   if((trim($usuariod)==NULL)|(trim($nombresDoc)==NULL)|(trim($apellidosDoc)==NULL)|(trim($grupo)==NULL)|(trim($pass)==NULL)) {
        echo "<div class='alert alert-danger col-lg-8'>
                  Los campos marcados con (*) son requeridos debe llenarlos!!!
              </div>";
		/*echo '<script type="text/javascript">
               window.location="../registroDoc.php?'.md5("registrocamposvaciosDoc").'";
              </script>';*/
   }
   if ($registroDoc->usuarioUnico($usuariod)=='t') {
      if ($registroDoc->emailUnico($emailDoc)=='t') {
         if ($registroDoc->verificarGrupo($grupo)=='t') {
            
            $connec=new ConexionTIS();
            $connec->registrarUsuarioDoc($grupo, $usuariod, $pass, $nombresDoc." ".$apellidosDoc,$telefono,$emailDoc);
            echo "Se registro en la base de datos";
         }
         else{
            echo "<div class='alert alert-danger col-lg-8'>
                        El numero de grupo ya existe ingrese un numero de grupo diferente !!!
                  </div>";
            /*echo '<script type="text/javascript">
                  window.location="registroDoc.php?'.md5("grupoExisteDoc").'";
                </script>';*/
         }
      }
      else{
         echo "<div class='alert alert-danger col-lg-8'>
                  la direccion de correo electronico ya esta siendo usada por otro usuario ingrese uno nuevo !!!
               </div>";
         /*echo '<script type="text/javascript">
                  window.location="registroDoc.php?'.md5("emailExisteDoc").'";
                </script>';*/
      }
   }
   else{
      echo "<div class='alert alert-danger col-lg-8'>
               El nombre de usuario ya esta siendo usado por otro usuario ingrese uno diferente !!!
            </div>";
      /*echo '<script type="text/javascript">
               window.location="registroDoc.php?'.md5("registroUsuarioExisteDoc").'";
             </script>';*/
   }
?>
