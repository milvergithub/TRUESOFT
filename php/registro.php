<?php 
   include 'clases/RegistroTIS.php';
   $registro=new RegistroTIS();
?>
<div class="container container-fluid panel panelaso"><br/>
   <div class="panel subtitulo">
      <h1>Registro de Usuario-Estudiante</h1>
      <h4>(*) Requerimientos importantes</h4>
   </div>
      <?php
      ?>
      <div class="" id="mensajeRegistroRepresentante">

      </div>
      <form class="form-group col-lg-6 well"  method="post" id="formularioRegistroRep">
         <div class="control-group">
            <span class="glyphicon glyphicon-user">Usuario:</span>  
            <input class="form-control input-sm" type="text" name="nombreuser" id="nombreuser"/>
         </div>
         <div class="control-group">
            <span class="glyphicon">Grupo:</span>
            <select class="form-control input-sm" name="grupo" id="grupo">
                <option value="">Selecione su grupo</option>
               <?php $registro->dameDocentesActivos() ?>
            </select> 
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
            <span class="glyphicon glyphicon-lock"> Password:</span>
            <input class="form-control input-sm" type="password" name="password" id="password"/>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-envelope"> Email:</span> 
            <input class="form-control input-sm" type="text" name="email" id="email"/>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-phone-alt"> Telefono:</span> 
            <input class="form-control input-sm" type="text"  name="telefono" id="telefono"/><br>
         </div>
            <input class="btn btn-primary" type="submit" value="Registrar" />
	</form>
    
   </div>