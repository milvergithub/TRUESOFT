<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
   <?php include 'php/head.php'; ?>
   <body style="background:url(img/fondoo.png);" >
       <?php
       include 'php/navegacion.php';
       ?>
      <div class="">
         <div id="contenido" class="">  
           <?php
             if (isset($_REQUEST[md5("errorlogin")])) {
               ?>
             <div class='alert alert-danger col-lg-11'>
                <b>error de logeo no coinside el nombre de usuario con la contrasena vuelva intentarlo !!!</b>
               <a href="" class="btn btn-link" data-toggle="modal" data-target="#basicModal">intentar otra vez</a>
             </div>
            <?php
            }
            elseif((isset($_REQUEST[md5("registroCompleto")]))||(isset($_REQUEST["registroEmpresa"])) || (isset($_REQUEST[md5('registroEmpresaIntegrantes')]))||(isset($_REQUEST["registroEmpresaHorario"])) || (isset($_REQUEST['RegistroEmpresaAIntegrantes']))) {
               include 'php/registroGE.php';
            }
            elseif(isset($_REQUEST[md5("registro")])) {
               include_once 'php/registro.php';
            }
            elseif(isset($_REQUEST["evaluararchivos"])) {
               include_once './php/EmpresasAEvaluar.php';
            }
            elseif(isset($_REQUEST['propuestas'])) {
               include_once 'php/formEntregaPropuesta.php';
            }
            elseif(isset($_REQUEST['subirdocumentacion'])) {
               include_once './php/formEntregaDocum.php';
            }
            elseif(isset($_REQUEST['individual'])) {
               include_once './php/evaluacionIndividualEmpresa.php';
            }
            elseif(isset($_REQUEST['grupal'])) {
               include_once './php/evaluacionGrupalEmpresa.php';
            }
            elseif(isset($_REQUEST['seguimiento'])) {
               if ($_SESSION['coduser']!=NULL) {
                  include_once 'php/seguimiento.php';
               }
               else{
                  include_once './php/error.php';
               }
            }
            elseif(isset($_REQUEST[md5("codEmpH")])) {
               if (is_numeric($_GET[md5("codEmpH")])) {
                  include_once 'inc/historialseguimiento.php';
               }
               else{
                  include_once './php/error.php';
               }
            }
            elseif(isset($_GET[md5("codEmp")])){
               if (is_numeric($_GET[md5("codEmp")])) {
                  include 'php/evaluarEmpresa.php';
               }
               else{
                  include_once './php/error.php';
               }
            }
            elseif(isset($_REQUEST['registrodocentes'])) {
               require_once 'php/registroDoc.php';
            }
            elseif(isset($_REQUEST['creardocumentolectura'])){
               require_once 'php/crearDocumento.php';
            }
            elseif(isset($_REQUEST['creardocumentoentrega'])) {
               require_once './php/crearDocumentosEntrega.php';
            }
            elseif(isset($_REQUEST['crearconv'])) {
               require_once './php/crearConvocatoria.php';
            }
            elseif(isset($_REQUEST['configuracionadminhoradocente'])||(isset($_REQUEST['configuracionadminestadodoc']))) {
               require_once 'php/configadmin.php';
            }
            elseif(isset($_REQUEST['configuraciondoc'])) {
               require_once './php/configdoc.php';
            }
            elseif(isset($_REQUEST['configuraciondocum'])) {
               require_once './php/configdocum.php';
            }
            elseif(isset($_REQUEST['chat'])) {
               require_once './php/chatsms.php';
            }
            elseif(isset($_REQUEST['formhorario'])) {
               require_once './php/formAsignarHorario.php';
            }
            elseif(isset($_REQUEST['creargrupo'])) {
               require_once './php/crearGrupos.php';
            }
            elseif(isset($_REQUEST['editardocumentolectura'])) {
               require_once './update/updateDocumentoLectura.php';
            }
            elseif(isset($_REQUEST['editardocumentoentrega'])) {
               require_once './update/updateDocumentosEntrega.php';
            }
            elseif(isset($_REQUEST['configuracionsemestral'])) {
               require_once './php/confsemest.php';
            }
            
            elseif(isset($_REQUEST[md5("consultaNombreEmpresas")])) {
               include_once 'php/consultaGE.php';
            }
            elseif(isset($_REQUEST['asistencias'])) {
               include_once './inc/asistenciasGE.php';
            }
            elseif(isset($_REQUEST['evaluardocumentacion'])) {
               include_once './php/EmpresaEvaluarDocumentacion.php';
            }
            elseif(isset($_REQUEST['evaluaciondocumentacion'])) {
               include_once './php/evaluacionDocumentacionEmpresa.php';
            }
            elseif(isset($_REQUEST['vernotas'])) {
               include_once './php/notasEmpresa.php';
            }
            elseif(isset($_REQUEST[md5('descargarfiles')])) {
               include_once './php/formDownloadFiles.php';
            }
            //vernotas descargarfiles
            else {
               include_once './inc/inicio.php';
            }
            ?>
         <?php
            //include_once './inc/inicio.html';
            include 'php/loginModal.php';
         ?>  
        </div>
      </div>
      <div class="footer-container"><!-- Begin Footer -->
    	<div class="container">
        	<div class="row footer-row">
                <div class="span3 footer-col">
                    <h5>About Us</h5>
                    <img src="img/fotos/foto.png" width="50" height="50" alt="Piccolo" /><br /><br />
                    <address>
                        <strong>Design Team</strong><br />
                        Brigstar Soft<br />
                        Sistema apoyo TIS<br />
                    </address>
                   
                </div>
                <div class="span3 footer-col">
                    <h5>Desarrolladores</h5>
                    <ul>
                        <li><a href="#">@Milver flores acevedo</a> Programador Web,Disenador Web y base de datos.</li>
                        <li><a href="#">@Juan Carlos Guzman</a> Programador Web y Base de datos.</li>
                        <li><a href="#">@Maicol Acha Calle</a> Programador Web, Edicion de imagen.</li>
                        <li><a href="#">@Riber Mollinedo Pedraza</a> Tester.</li>
                    </ul>
                </div>
                <div class="span3 footer-col">
                    <h5>Fotos Circulos</h5>
                    <ul class="img-feed">
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright "></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                       <li><a href="#"><img src="img/fotos/foto.png" width="50" height="50" class="img-circle showbox slideright"></a></li>
                    </ul>
                </div>
            </div>

            <div class="row"><!-- Begin Sub Footer -->
                <div class="span12 footer-col footer-sub">
                    <div class="row no-margin">
                        <div class="span6"><span class="left glyphicon glyphicon-copyright-mark">Copyright 2014 Desarrollado pos Brigstar Soft.</span></div>
                        <div class="span6">
                            
                        </div>
                    </div>
                </div>
            </div><!-- End Sub Footer -->

        </div>
    </div><!-- End Footer --> 
   </body>
</html>