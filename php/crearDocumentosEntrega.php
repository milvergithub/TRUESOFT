<div class="container container-fluid">
   <div id="mensaje">
      
   </div>
   <form id="formularioCrearDocEntrega" class="form-group panel-info" method="post" enctype="multipart/form-data">
      <table class="table table-hover table-bordered table-condensed table-striped" id="tablaDocumentosPresentacion">
         <caption class="caption"><h3>CREAR DOCUMENTOS DE ENTREGA</h3></caption>
         <tr><th><span class="glyphicon glyphicon-file h3"></span></th><th>Nombre</th><th>tipo</th><th>calificacion</th><th>archivo<span class="glyphicon glyphicon-file h3"></span></th><th><span class="glyphicon glyphicon-download-alt h3"></span></th></tr>         
         <?php include 'php/documentosEntrega.php'; ?>
         <tr>
            <td>
               <div class="control-group">
                  <input class="form-control input-sm" type="text" name="nombre" id="nombre"/>
               </div>
            </td>
            <td>
               <div class="control-group">
                  <select class="form-control" name="tipo" id="tipo">
                     <option value="">selecionar</option>
                     <?php $gestioDoc->dameDocumentosTipoPresentacion(); ?>
                  </select>
               </div>   
            </td>
            <td>
               <div class="control-group">
                  <input class="form-control input-sm" type="text" name="calificacion" id="calificacion"/>
               </div>
            </td>
            <td>
               <div class="control-group">
                  <input type="file" name="documento" class="btn btn-primary btn-sm" title="subir archivo" id="documento"/>
               </div>
            </td>
            <td>
               <input type="submit" class="btn btn-primary btn-sm"/>
            </td>
         </tr>
         

      </table>
   </form>
   <div id="mensajeDocumentos">
      
   </div>
</div>