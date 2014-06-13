<?php
/**
 * Clase para gestionar horarios su creacion o eliminacion y actualiacion
 *
 * @author milver
 */
class Horarios {
   private $conexionHorario;
   public function __construct() {
      $this->conexionHorario=new ConexionTIS();
   }
   public function obtenerAsignadoAGrupo($codgrupo,$hora,$dia) {
      $resultadoOAAG=  $this->conexionHorario->horarioSiFueAsignada($codgrupo, $hora, $dia);
      while ($regOAAG = pg_fetch_assoc($resultadoOAAG)) {
         $resOAAG=$regOAAG['codhora'];
      }
      return $resOAAG;
   }
   function dameHorariosAsignado($codgrupo) {
      $resultadoHHAG=  $this->conexionHorario->horarioHorariosAsignadosGrupo($codgrupo);
      while ($regHHAG = pg_fetch_assoc($resultadoHHAG)) {
         echo '<tr>
                  <form  action="php/removeHoraDiaHorario.php" method="POST">
                  <td>
                     <span class="glyphicon glyphicon-calendar"> '.$regHHAG['dia'].'</span>
                     <input type="hidden" value="'.$regHHAG['codhora'].'" name="codigohora">
               </td>
               <td>
                  <span class="glyphicon glyphicon-calendar"> '.$regHHAG['hora'].'</span>
               </td>
               <td>
                  <span class="glyphicon glyphicon-trash"><input type="submit" class="btn btn-link" value="Eliminar"></span>
                  <a href="php/formUpdateHorario.php" class="btn btn-link"><span class="glyphicon glyphicon-refresh">Actualizar</span></a>
               </td>
            </form>
            </tr>';
      }
   }
}
?>

