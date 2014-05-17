<?php
   for ($index = 0; $index <3; $index++) {

      echo '<div class="form-group panel panel-info well">
               <div class="form-group">
                  <label for="integ'.($index+1).'" class="col-lg-3 control-label">integrante '.($index+1).'</label>
                  <div class="col-lg-7">

                  </div>
               </div>

               Nombres * :<input type="text" class="form-control input-sm" name="nombres[]" placeholder="nombre integrante" required="true">
               C.I. *: <input type="text" id="carnet'.($index+1).'" class="form-control input-sm" name="carnets[]" placeholder="numero ci" required="true"> 
               <span class="glyphicon glyphicon-earphone"> Telefono:</span>
               <input type="text" id="telefono'.($index+1).'" class="form-control input-sm" name="telefonos[]" placeholder="telefono">
               <span class="glyphicon glyphicon-envelope"> Email:</span>
               <input type="text" class="form-control input-sm" name="emails[]" placeholder="ejemplo@dominio.com">
               <span class="glyphicon glyphicon-open"></span>
               <input type="file" class="btn btn-primary btn-sm" name="fotos[]" title="subir foto &triangleq;" src="">
            </div>';
   }
?>


