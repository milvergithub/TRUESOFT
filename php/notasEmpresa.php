<?php
session_start();
    include 'clases/GestionDocumentos.php';
    $gestion = new GestionDocumentos();
?>
<div class="panel titulo"><h2><b>Historial De Calificaciones De La Empresa</b></h2></div>
<div class="table table-responsive">
    <form>
        <table class=" table table-hover">
            <tr>
                <td>
                    <span class="glyphicon"><h4><b>INTEGRANTES</b></h4></span>
                </td>
                <td>
                    <span class="glyphicon"><h4><b>EVALUACION PROPUESTA</b></h4></span>
                </td>
                <td>
                    <span class="glyphicon"><h4><b>EVALUACION DEL SEGUIMIENTO</b></h4></span>
                </td>
                <td>
                    <span class="glyphicon"><h4><b>EVALUACION DE LA DOCUMENTACION</b></h4></span>
                </td>
                <td>
                    <span class="glyphicon"><h4><b>DEFENSA DEL PROYECTO</b></h4></span>
                </td>
                <td>
                    <span class="glyphicon"><h4><b>NOTA FINAL</b></h4></span>
                </td>
            </tr>
            <?php $gestion->verNotasGrupoEmp($_SESSION['coduser']); ?>
        </table>
    </form>
</div>

