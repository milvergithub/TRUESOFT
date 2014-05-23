<?php
include 'clases/GrupoEmpresas.php';
    $cod=$_GET[md5('codEmp')];
?>
<form method="post" action="php/proceval.php" name="evaluar" role="form">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-condensed">
           <caption class="caption panel-heading h2">Evaluacion de seguimiento semanal</caption>
            <thead>
               <tr><th></th><th class="h4">INTEGRANTE</th><th class="h4">ASISTENCIA</th><th class="h4">LICENCIA</th><th class="h4">PARTICIPACION</th><th class="h4">JUSTIFICACION</th><th class="h4">CALIFICACION</th><th class="h4">OBSERVACIONES</th></tr>
            </thead>
            <tbody>
                <?php
                     $emp=new GrupoEmpresa();
                     $emp->dameIntegrantes($cod);
                ?>
                <tr><td colspan="8"><input type="submit" value="evaluar" class="btn btn-success bt-lg btn-block"></td></tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</form>
