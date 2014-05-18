<?php include 'php/head.php'; ?>
<form  class="form-group" method="POST" action="subirDocumentoConv.php" enctype="multipart/form-data" id="formularioCrearDocLectura">
    <div class="form-group table-responsive"> 
        <table class="table table-hover" id="tablaDocumtosLectura">
            <tr>
                <td><span class="glyphicon">Nombre</span></td>
                <td>archivo <span class="glyphicon glyphicon-paperclip"></span></td>
                <td>descargas <span class="glyphicon glyphicon-download-alt"></span></td>
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