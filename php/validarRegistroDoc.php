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
   
   if (trim($emailDoc)==NULL) {
      $emailDoc="*";
   }
   if (trim($telefono)==NULL) {
      $telefono=-1;
   }
   
   if((trim($usuariod)==NULL)|(trim($nombresDoc)==NULL)|(trim($apellidosDoc)==NULL)|(trim($grupo)==NULL)|(trim($pass)==NULL)) {
        echo "<div class='alert alert-danger col-lg-8'>
                  Los campos marcados con (*) son requeridos debe llenarlos!!!
              </div>";
   }
   if ($registroDoc->usuarioUnico($usuariod)=='t') {
      if ($registroDoc->grupoUsado($grupo)=='t') {
         if ($registroDoc->emailUnico($emailDoc)=='t') {
            $connec=new ConexionTIS();
            $connec->registrarUsuarioDoc($grupo, $usuariod, $pass, $nombresDoc." ".$apellidosDoc,$telefono,$emailDoc);
            echo "<div class='alert alert-success col-lg-8'>
                     Se registro a un nuevo docente satisfactoriamente...
                  </div>";
         }
         else{
            echo "<div class='alert alert-danger col-lg-8'>
                     la direccion de correo electronico ya esta siendo usada por otro usuario ingrese uno nuevo !!!
                  </div>";
         }
      }
      else{
         echo "<div class='alert alert-danger col-lg-8'>
                  el grupo ya esta siendo usado por otro docente !!!
               </div>";
      }
   }
   else{
      echo "<div class='alert alert-danger col-lg-8'>
               El nombre de usuario ya esta siendo usado por otro usuario ingrese uno diferente !!!
            </div>";
   }
?>
