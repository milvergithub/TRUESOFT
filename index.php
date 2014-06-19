<?php
session_start();
if(isset ($_REQUEST[md5("errorlogin")])){
    $errorlogin=TRUE;
}
if(isset($_REQUEST[md5("registro")])){
   $registro=TRUE;
}
?>
<!DOCTYPE html>
<html>
   <?php include 'php/head.php'; ?>
   <body style="background:url(img/fondoo.png);" >
       <?php
       include 'php/navegacion.php';
       ?>
      <div class="container container-fluid">
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
            if ((isset($_REQUEST[md5("registroCompleto")]))||(isset($_REQUEST["registroEmpresa"])) || (isset($_REQUEST[md5('registroEmpresaIntegrantes')]))||(isset($_REQUEST["registroEmpresaHorario"])) || (isset($_REQUEST['RegistroEmpresaAIntegrantes']))) {
               include 'php/registroGE.php';
            }
            if ($registro) {
               include_once 'php/registro.php';
            }
            if (isset($_REQUEST[md5("consultaNombreEmpresas")])) {
               include_once 'php/consultaGE.php';
            }
            if (isset($_REQUEST["evaluararchivos"])) {
               include_once './php/EmpresasAEvaluar.php';
            }
            if (isset($_REQUEST['propuestas'])) {
               include_once 'php/formEntregaPropuesta.php';
            }
            if (isset($_REQUEST['subirdocumentacion'])) {
               include_once './php/formEntregaDocum.php';
            }
            if (isset($_REQUEST['individual'])) {
               include_once './php/evaluacionIndividualEmpresa.php';
            }
            if (isset($_REQUEST['grupal'])) {
               include_once './php/evaluacionGrupalEmpresa.php';
            }
            if (isset($_REQUEST['seguimiento'])) {
               if ($_SESSION['coduser']!=NULL) {
                  include_once 'php/seguimiento.php';
               }
               else{
                  include_once './php/error.php';
               }
            }
            if(isset($_GET[md5("codEmp")])){
               if (is_numeric($_GET[md5("codEmp")])) {
                  include 'php/evaluarEmpresa.php';
               }
               else{
                  include_once './php/error.php';
               }
            }
            if (isset($_REQUEST['registrodocentes'])) {
               require_once 'php/registroDoc.php';
            }
            if (isset($_REQUEST['creardocumentolectura'])){
               require_once 'php/crearDocumento.php';
            }
            if (isset($_REQUEST['creardocumentoentrega'])) {
               require_once './php/crearDocumentosEntrega.php';
            }
            if (isset($_REQUEST['crearconv'])) {
               require_once './php/crearConvocatoria.php';
            }
            if (isset($_REQUEST['configuracionadminhoradocente'])||(isset($_REQUEST['configuracionadminestadodoc']))) {
               require_once 'php/configadmin.php';
            }
            if (isset($_REQUEST['configuraciondoc'])) {
               require_once './php/configdoc.php';
            }
            if (isset($_REQUEST['configuraciondocum'])) {
               require_once './php/configdocum.php';
            }
            if (isset($_REQUEST['chat'])) {
               require_once './php/chatsms.php';
            }
            if (isset($_REQUEST['formhorario'])) {
               require_once './php/formAsignarHorario.php';
            }
            if (isset($_REQUEST['creargrupo'])) {
               require_once './php/crearGrupos.php';
            }
            if (isset($_REQUEST['editardocumentolectura'])) {
               require_once './update/updateDocumentoLectura.php';
            }
            if (isset($_REQUEST['editardocumentoentrega'])) {
               require_once './update/updateDocumentosEntrega.php';
            }
            ?>
         <?php
            include 'php/loginModal.php';
         ?>  
        </div>
      </div>
   </body>
</html>
