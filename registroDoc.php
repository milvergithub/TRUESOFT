<!DOCTYPE html>
<html>
<?php
include 'php/head.php';
?>
   <?php
      if (isset($_REQUEST[md5("registrocamposvaciosDoc")])) {
         ?>
       <div class='alert alert-danger col-lg-8'>
         los campos no deben estar vacios !!!
       </div>
         <?php
      }
      if (isset($_REQUEST[md5("registroUsuarioExisteDoc")])) {
         ?>
         <div class='alert alert-danger col-lg-8'>
            El usuario ya Existe !!!
         </div>
         <?php
      }
      if (isset($_REQUEST[md5("emailExisteDoc")])) {
         ?>
         <div class='alert alert-danger col-lg-8'>
            Email ya Existe !!!
         </div>
         <?php
      }
      if (isset($_REQUEST[md5("grupoExisteDoc")])) {
         ?>
          
         <?php
      }
      ?>
   <div class="container container-fluid center-block">
      <h2>Registro de Usuario-Docente</h2>
      <h4>(*) Requerimientos importantes</h4>
      <div id="ok" class=""></div>
      <form class="form-group col-lg-8 panel panel-body" action="php/validarRegistroDoc.php" method="post" id="formularioRegistroDoc">
         <div class="control-group">
            <span class="glyphicon glyphicon-user">Usuario:</span>  
            <input class="form-control input-sm" type="text" name="nombreuser" id="nombreuser"/>  		
         </div>
         <div class="control-group">
            <span class="glyphicon"> Nombres:</span>
            <input class="form-control input-sm" type="text" name="nombres" id="nombres"/>
         </div>
         <div class="control-group">
            <span class="glyphicon"> Apellidos:</span>
            <input class="form-control input-sm" type="text" name="apellidos" id="apellidos"/>
         </div>
         <div class="control-group">
            <span class="glyphicon" > NroGrupo</span>
            <input class="form-control input-sm" type="text" name="nrogrupo" id="nrogrupo"/>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-lock">Password:</span>
            <input class="form-control input-sm" type="password" name="password" id="password"/>
         </div>
         <div class="control-group">
            <span class="glyphicon">Email:</span> 
            <input class="form-control input-sm" type="text" name="emailDoc" id="emailDoc"/>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-phone">Telefono:</span> 
            <input class="form-control input-sm" type="text" name="telefono" id="telefono"/><br/><br/>
         </div>
         <input class="btn btn-primary" type="submit" value="Registrar" />
       </form>
   </div>
</html>