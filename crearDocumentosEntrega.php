<?php
   include 'php/head.php';
?>
<div class="container container-fluid">
   <h3>CREAR DOCUMENTOS DE ENTREGA</h3>
   <div id="mensaje">
      
   </div>
   <form id="formularioCrearDocEntrega" class="form-group panel-info" method="post" enctype="multipart/form-data">
      <table class="table table-hover" id="tablaDocumentosPresentacion">
         <tr><td>nombre</td><td>tipo</td><td>calificacion</td><td>archivo<span class="glyphicon glyphicon-open"></span></td><td><span class="glyphicon glyphicon-export"></span></td></tr>         
         <?php include './php/documentosEntrega.php'; ?>
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