<?php
?>
<div class="panel col-lg-4 col-md-8 col-sm-8 col-xs-12">
   <h3 class="h3 panel titulo">formulario Chat</h3>
   <div id="chat" class="panel panel-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-y: scroll; height: 320px">
      <?php
      include 'clases/Chat.php';
      $chatear=new Chat();
      $chatear->obtenerMensajesActuales($_SESSION['coduser']);
      ?>
   </div>
   <form id="formularioChat" method="POST" class="well form form-inline col-lg-12 col-md-8 col-sm-12 col-xs-12">
      <input type="text" class="form-control input-sm" name="mensaje" id="mensaje">
      <?php echo '<input type="hidden" name="codUsuario" id="codUsuario" value="'.$_SESSION['coduser'].'">'; ?>
      <input type="submit" class="btn btn-primary" value="enviar">
   </form>
</div>
<div class="panel col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <h3 class="h3 panel titulo">formulario Foro</h3>
   <div id="foro" class="panel panel-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-y: scroll; height: 300px">
      
   </div>
   <form id="formularioForo" method="POST" class="well form form-inline col-lg-12 col-md-8 col-sm-12 col-xs-12">
      <textarea class="form-control col-lg-6" name="contenidoForo" id="contenidoForo"></textarea>
      <input type="file" class="btn btn-primary input-sm" name="anexo" id="anexo">
      <input type="submit" class="btn btn-primary" value="enviar">
   </form>
   <div id="mensajeForoEnvio">
      
   </div>
</div>