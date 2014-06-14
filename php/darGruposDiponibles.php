<?php
?>
<tr>
   <td><span class="glyphicon">Numero Grupo</span></td>
   <td>Docente <span class="glyphicon glyphicon"></span></td>
   <td> Estado <span class="glyphicon glyphicon-user"></span></td>
   <td> 
      Eliminar <span class="glyphicon glyphicon-remove"></span>
      <button class="btn btn-default navbar-right" onClick="document.location.reload(true)"> <span class="glyphicon glyphicon-refresh"></span></button>
   </td>
</tr>
<?php
$gestionDL=new GestionDocumentos();
$gestionDL->dameGrupoLibres();
?>
<tr><td colspan="4"><div class="alert alert-info">Grupos libres para asignacion</div></td></tr>