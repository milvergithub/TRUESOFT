<?php 
   include 'clases/RegistroTIS.php';
   $registro=new RegistroTIS();
?>
<div class="container container-fluid">
      <h1>Registro de Usuario-Estudiante</h1>
      <h4>(*) Requerimientos importantes</h4>
      <?php
      if (isset($_REQUEST[md5("registrocamposvacios")])) {
         ?>
       <div class='alert alert-danger col-lg-8'>
         los campos no deben estar vacios !!!
       </div>
         <?php
      }
      if (isset($_REQUEST[md5("registrocontrasenasdiferentes")])) {
         ?>
         <div class='alert alert-danger col-lg-8'>
            las contrasenas no son iguales !!!
         </div>
         <?php
      }
      if (isset($_REQUEST[md5("registroUsuarioExiste")])) {
         ?>
         <div class='alert alert-danger col-lg-8'>
            El usuario ya Existe !!!
         </div>
         <?php
      }
      if (isset($_REQUEST[md5("emailExiste")])) {
         ?>
         <div class='alert alert-danger col-lg-8'>
            Email ya Existe !!!
         </div>
         <?php
      }
      ?>
      <form class="form-group col-lg-8 well" action="php/regValid.php" method="post">
         <span class="glyphicon glyphicon-user">Usuario:</span>  
         <input class="form-control input-sm" type="text" maxlength="25" size="25" name="nombreuser" />
         <span class="glyphicon">Grupo:</span>
         <select class="form-control input-sm" name="grupo">
			<?php $registro->dameDocentesActivos() ?>
         </select> 
         <span class="glyphicon"> Nombres:</span>
         <input class="form-control input-sm" type="text" maxlength="25" size="25" name="nombres" />
         <span class="glyphicon"> Apellidos:</span>
         <input class="form-control input-sm" type="text" maxlength="25" size="25" name="apellidos" />
         <span class="glyphicon glyphicon-lock"> Password:</span>
         <input class="form-control input-sm" type="password" maxlength="25" size="25" name="password" />
         <span class="glyphicon glyphicon-lock"> Repita password:</span>
         <input class="form-control input-sm" type="password" maxlength="25" size="25" name="cpassword" />
         <span class="glyphicon glyphicon-envelope"> Email:</span> 
         <input class="form-control input-sm" type="text" maxlength="35" size="25" name="email" />
         <span class="glyphicon glyphicon-phone-alt"> Telefono:</span> 
         <input class="form-control input-sm" type="text" maxlength="10" size="25" name="telefono" /><br>
         <input class="btn btn-primary" type="submit" value="Registrar" />
	</form>
   </div>