<html>
 <head>
      <title>Subir convocatoria</title>
 </head>
 <?php include 'php/head.php'; ?>
 <body>
 <center><h1>SUBIR CONVOCATORIA</h1></center>
 <h2>Formulario para el envio de convocatorias</h2>
 <div class="container container-fluid">
    <form class="form-horizontal panel panel-default" role="form" action="enviar_file.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="limite" value="500000" >
     
     <div class="form-group">
        <label for="cp" class="col-lg-4 control-label">Convocatoria Publica</label>
        <div class="col-lg-2">
           <input id="cp" class="btn btn-primary" type="file" name="archivo1">
        </div>
        <label for="coment1" class="col-lg-4 control-label">Comentarios</label>
         <div class="form-group">
            <div id="coment1" class="form-group">
               <textarea id="coment1" class="form-control" name="comentario"></textarea>
            </div>
         </div>
     </div>
     
     <div class="form-group">
         <label for="pe" class="col-lg-4 control-label">Pliego de especificaciones</label>
         <div class="col-lg-2">
            <input id="pe" class="btn btn-primary" type="file" name="archivo2">
         </div>
         <label for="coment2" class="col-lg-4 control-label">Comentarios</label>
         <div id="coment2" class="form-group">
            <textarea id="coment2"class="form-control" name="comentaro2"></textarea>
         </div>
     </div>
     
     <p><input  class="btn btn-success" type="submit" name="submit" value="Verificar"></p>
   </form>
 </div> 
 </body>
</html>