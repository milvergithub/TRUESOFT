<html>
<?php
include './php/head.php';
?>
   <body>
      <div class="col-lg-3">
         
      </div>
      <div class="col-lg-5 panel panel-success">
         <div class="alert alert-success" id="mensajeSettings">
            <b>formulario de registro del administrador</b>
         </div>
         <form class="form" method="POST" id="formularioSettings">
            <span class="glyphicon glyphicon-user"><b>cuenta administrador</b></span>
            <div class="control-group">
               <input type="text" class="form-control campoNombres" name="cuenta" id="cuenta"/>
            </div>
            <span class="glyphicon glyphicon-user"><b>nombres administrador</b></span>
            <div class="control-group">
               <input type="text" class="form-control campoNombres" name="nombres" id="nombres"/>
            </div>
            <span class="glyphicon glyphicon-lock"><b>password administrador</b></span>
            <div class="control-group">
               <input type="password" class="form-control campoNombres" name="pass" id="pass" />
            </div><br/>
            <input type="submit" value="configurar" class="btn btn-primary"/>
         </form>
      </div>
      <div class="col-lg-3">
         
      </div>
   </body>
</html>
