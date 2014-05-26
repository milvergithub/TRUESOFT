<div class="container container-fluid">
   <div id="mensaje">
      
   </div>
   <form  class="form-group" method="POST" enctype="multipart/form-data" id="formularioCrearDocLectura">
    <div class="form-group table-responsive"> 
        <table class="table table-hover table-bordered table-condensed table-striped" id="tablaDocumtosLectura">
            <caption class="caption"><h3>CREAR DOCUMENTOS DE ENTREGA</h3></caption> 
            <tr>
               <td><span class="glyphicon glyphicon-file h3"></span></td>
               <td><span class="glyphicon">Nombre</span></td>
               <td><span class="glyphicon glyphicon-paperclip h3"></span></td>
               <td><span class="glyphicon glyphicon-download-alt h3"></span></td>
            </tr>
            <?php include 'php/documentosLectura.php'; ?>
            <tr>
                <td>
                   <div class="control-group">
                      <input class="form-control" type="text" name="nombredoc" placeholder="nombre" id="nombredoc"/> 
                   </div>
                </td>
                <td>
                   <div class="control-group">
                     <input class="btn btn-primary btn-sm" name="archivo" type="file" id="archivo"/> 
                     <span class="glyphicon glyphicon-search"></span>
                   </div>
                </td>
                <td>
                   <div class="control-group">
                     <input class="btn btn-primary btn-sm" type="submit" value='Subir Documento'/>
                     <span class="glyphicon glyphicon-upload"></span>
                   </div>
                </td>
            </tr>
        </table>
        
    </div>     
</form>
</div>
<div id="mensajeDocumentosLectura">
   
</div>