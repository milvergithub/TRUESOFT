<?php include 'php/head.php'; ?>
<form  class="form-group" method="POST" action="subirDocumentoConv.php" enctype="multipart/form-data">
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
                   <input class="form-control" type="text" name="nombredoc" placeholder="nombre"/> 
                </td>
                
                <td>
                    <input class="btn btn-primary btn-sm" name="archivo" type="file"/> 
                </td>
                
                <td>
                    <input class="btn btn-primary btn-sm" type="submit"/>
                </td>
            </tr>
        </table>
        
    </div>     
</form>