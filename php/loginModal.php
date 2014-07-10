<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header panel">
            <button type="button" class="close btn btn-default" data-dismiss="modal" aria-hidden="true">
               <span class="glyphicon glyphicon-remove"></span>
            </button>
         <h4 class="modal-title">Formulario Logeo</h4>
         </div>
         <div class="modal-body">
            <form class="form-group well" role="form" action="php/logear.php" method="post">
              <div class="input-group">
                 <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                 <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
              </div>
                <br>
              <div class="input-group">
                 <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                 <input type="password" name="pass" class="form-control" placeholder="Contraseña">
              </div>
                <br>
              <div class="input-group">
                  <button type="submit" class="btn btn-primary">Entrar</button>
              </div>
            </form>
         </div>
         <div class="modal-footer">
            <span class="glyphicon glyphicon-copyright-mark"></span> 2014 Derechos reservados TIS
         </div>
      </div>
   </div>
  </div>