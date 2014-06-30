<div class="panel">
   <div class="panel titulo">
      <h3>FundaempresaTIS</h3>
   </div>
   <div class="col-lg-6 navbar-right">
     <div class="input-group">
        <input id="buscador" type="text" class="form-control" placeholder="escriba un texto para buscar">
        <span class="input-group-btn">
          <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
       </span>
     </div>
   </div><br><br>
   <div  class="table-responsive">
     <table class="table table-hover table-bordered table-striped">
        <caption class="caption h3 subtitulo panel">Empresas Registradas</caption> 
        <tr><th>gestion</th><th>convocatoria</th><th>nombre</th><th>logo</th></tr>
         <tbody id="tablaGE">
           <?php 
              include 'php/TablaGrupoEmpresas.php';
           ?>
         </tbody>
         <tfoot>

         </tfoot>
     </table>
   </div>
</div>

