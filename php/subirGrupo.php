<tr>
   <td><span class="glyphicon">Numero Grupo</span></td>
   <td>Docente <span class="glyphicon glyphicon"></span></td>
   <td> Por Designar <span class="glyphicon glyphicon-user"></span></td>
   <td> 
      Eliminar <span class="glyphicon glyphicon-remove"></span>
      <button class="btn btn-default navbar-right" onClick="document.location.reload(true)"> <span class="glyphicon glyphicon-refresh"></span></button>
   </td>
</tr>
<?php
include '../clases/GestionDocumentos.php';
 $gestionDL=new GestionDocumentos();
$nroGrup=$_POST['nrogrupo'];
if ($gestionDL->verificarGrupoExistencia($nroGrup)=="f") {
   $gestionDL->dameGrupoLibres();
    echo '<tr><td colspan="4"><div class="alert alert-danger">El numero de grupo ya existe !!!</div></td></tr>';
}
else{
   $conex = new ConexionTIS();
   $conex->insertarGrupo($nroGrup);
   $gestionDL->dameGrupoLibres();
   echo '<tr>
            <td colspan="4">
               <div class="alert alert-success">
                  Grupo creado...<br/>
                  Puede que el boton <strong>asignar horario</strong> no funcione momentanamente haga refresh en el<br/>
                  boton <span class="glyphicon glyphicon-refresh h4"></span>
               </div>
            </td>
         </tr>';
}
?>
