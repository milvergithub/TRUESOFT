<?php
include 'clases/GrupoEmpresas.php';
$cod=$_GET[md5('codEmp')];
?>
<div></div>
<form method="post" action="php/proceval.php" name="evaluar" role="form" class="panel">
   <div class="panel panel-success">
      <div class="subtitulo panel h4">Seleccione tipo Evaluacion</div>
      <select name="tipo" class="form-control">
         <?php
            $empres=new GrupoEmpresa();
            $empres->dameTipoEvaluacion();
         ?>
      </select>
   </div> 
   <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-condensed">
           <caption class="caption titulo panel h3">Evaluacion de seguimiento semanal</caption>
            <thead>
               <tr><th>foto</th><th></th><th class="h4">INTEGRANTE</th><th class="h4">ASISTENCIA</th><th class="h4">LICENCIA</th><th class="h4">PARTICIPACION</th><th class="h4">JUSTIFICACION</th><th class="h4">CALIFICACION</th><th class="h4">OBSERVACIONES</th></tr>
            </thead>
            <tbody>
                <?php
                     $emp=new GrupoEmpresa();
                     $emp->dameIntegrantes($cod);
                ?>
                <tr>
                   <td colspan="6"><input type="submit" value="evaluar" class="btn btn-primary bt-lg btn-block"></td>
                   <td colspan="4"><a href="index.php?seguimiento" class="btn btn-primary bt-lg btn-block">cancelar</a></td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
   </div>
</form>
