<div class="container container-fluid">
   <div id="mensaje">
      
   </div>
   <form  class="form-group" method="POST" enctype="multipart/form-data" id="formularioCrearDocLectura">
    <div class="form-group table-responsive"> 
        <table class="table table-bordered table-hover table-condensed table-striped panel-default" id="tablaDocumtosLectura">
           <caption class="caption titulo"><h4><b>CREAR DOCUMENTOS DE LECTURA</b></h4></caption> 
            <tr>
               <th><span class="glyphicon glyphicon-file h3"></span></th>
               <th><span class="glyphicon"><b>Nombre</b></span></th>
               <th><span class="glyphicon glyphicon-paperclip h3"></span></th>
               <th><span class="glyphicon glyphicon-download-alt h3"></span></th>
               <th><span class="glyphicon glyphicon-edit h3"></span></th>
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