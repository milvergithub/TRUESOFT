<div class="panel panel-primary">
   <div class="panel panel-heading">
      <h3 class="panel-title">FundaempresaTIS</h3>
   </div>
   <div class="col-lg-8">
     <div class="input-group">
        <input id="buscador" type="text" class="form-control" placeholder="escriba un texto para buscar">
        <span class="input-group-btn">
          <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
       </span>
     </div>
   </div><br><br>
   <div  class="table-responsive">
     <table class="table table-hover table-bordered table-striped">
        <caption class="caption h3">Empresas Registradas</caption> 
        <tr><th class="col-lg-2">gestion</th><th class="col-lg-2">convocatoria</th><th class="col-lg-2">nombre</th><th>logo</th></tr>
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

