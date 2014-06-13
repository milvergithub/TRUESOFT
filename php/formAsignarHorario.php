<?php
include 'clases/ConexionTIS.php';
include 'clases/Horarios.php';

$horarios=new Horarios();
$codgrupo=$_GET['codgrupo'];
$dias=  array("lunes","martes","miercoles","jueves","viernes","sabado");
$horarioIni=array("06:45:00","08:15:00","09:45:00","11:15:00","12:45:00","14:15:00","15:45:00","17:15:00","18:45:00","20:15:00");
$horarioEnd=array("08:15:00","09:45:00","11:15:00","12:45:00","14:15:00","15:45:00","17:15:00","18:45:00","20:15:00","21:45:00");
?>
<div class="table-responsive">
   <table class="panel-default table table-bordered table-condensed table-hover table-striped">
      <caption class="caption h3 panel-heading">Horarios asignados</caption>
      <tr></tr><th class="h3">dia</th><th class="h3">hora</th><th><span class="glyphicon glyphicon-trash h3"></span></th></tr>
      <?php
         $horarios->dameHorariosAsignado($codgrupo);
      ?>
   </table>
   <table class="panel-default table table-bordered table-condensed table-hover table-striped">
      <caption class="caption h3 panel-heading">Formulario de asignacion de horarios</caption>
      <tr></tr><th class="h3">dia</th><th class="h3">horario</th><th><span class="glyphicon glyphicon-saved h3"></span></th></tr>
   <?php
   for ($cc = 0; $cc < count($dias); $cc++) {   
   ?>
   <tr>
   <form  action="php/saveHoraDiaHorario.php" method="POST">
      <td>
         <span class="glyphicon glyphicon-calendar"> <?php echo $dias[$cc]; ?></span>
         <?php echo '<input type="hidden" value="'.$dias[$cc].'" name="dia">'; ?>
         <?php echo '<input type="hidden" value="'.$codgrupo.'" name="codigogrupo">'; ?>
      </td>
      <td>
         <select class="form-control" name="horario">
         <?php
         for ($index = 0; $index < count($horarioIni); $index++) {
            echo "<option value='".$horarioIni[$index]."'>".$horarioIni[$index]." - ".$horarioEnd[$index]."</option>";
         }
         ?>
         </select>
      </td>
      <td>
         <input type="submit" value="asignar" class="btn btn-primary">
      </td>
   </form>
   </tr>
   <?php
   }
   ?>
   </table>
   <?php
   function linkRef($codGrupo) {
      if ($codGrupo==NULL) {
         echo '<a class="btn btn-link disabled"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>';
      }
      else{
         echo '<a class="btn btn-link"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>';
      }
   }
   ?>
</div>
