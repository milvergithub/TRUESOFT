<?php
session_start();
if(isset ($_REQUEST[md5("errorlogin")])){
    $errorlogin=TRUE;
}
if(isset($_REQUEST[md5("registro")])||isset($_REQUEST[md5("registrocamposvacios")])||isset($_REQUEST[md5("registrocontrasenasdiferentes")])||(isset($_REQUEST[md5("registroUsuarioExiste")]))||(isset($_REQUEST[md5("emailExiste")]))){//isset($_REQUEST[md5("emailExiste")])
   $registro=TRUE;
}
?>
<!DOCTYPE html>
<html>
   <?php include 'php/head.php'; ?>
   <body>
       <?php
       include 'php/navegacion.php';
       ?>
       <div class="container container-fluid" >
        <div id="contenido" class="container">
           <?php
            if ($errorlogin) {
               ?>
             <div class='alert alert-danger col-lg-11'>
               error de logeo no coinside el nombre de usuario con la contrasena vuelva intentarlo !!!
               <a href="" class="btn btn-link" data-toggle="modal" data-target="#basicModal">intentar otra vez</a>
             </div>
            <?php
            }
            if ((isset($_REQUEST[md5("registroCompleto")]))||(isset($_REQUEST[md5("registroEmpresa")])) || (isset($_REQUEST[md5('registroEmpresaIntegrantes')])) || (isset($_REQUEST[md5('errorNombreGrupoEmpresa')])) || (isset($_REQUEST[md5('continuarRegistroEmpresaAIntegrantes')])) || (isset($_REQUEST[md5("registroEmpresaHorario")])) || (isset($_REQUEST[md5('RegistroEmpresaAIntegrantes')]))) {
               include 'php/registroGE.php';
}
            if ($registro) {
               include 'php/registro.php';
            }
            if (isset($_REQUEST[md5("consultaNombreEmpresas")])) {
               include 'php/consultaGE.php';
            }
            if (isset($_REQUEST[md5("evaluarEmpresaArchivos")])) {
               include 'EmpresasAEvaluar.php';
            }
            ?>
         <?php
            include 'php/loginModal.php';
         ?>  
        </div>
      </div>
   </body>
</html>
