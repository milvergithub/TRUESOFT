<?php
include 'ConexionTIS.php';
/**
 * Description of Chat
 * @author milver
 */
class Chat {
   
   private $conexionChat;
   public function __construct() {
      $this->conexionChat=new ConexionTIS();
   }
   public function obtenerNombreUsuarioChat($codUser) {
      $resultadoONUC=  $this->conexionChat->chatDameNombreUsuario($codUser);
      while ($regONUC = pg_fetch_assoc($resultadoONUC)) {
         $resONUC=$regONUC['nombre'];
      }
      return $resONUC;
   }
   public function enviarMensajeChat($codUser,$mensaje) {
      $this->conexionChat->insertarMensajeChat($codUser, $mensaje);
   }
   public function obtenerMensajesActuales($codUser) {
      $resultadoOMA=  $this->conexionChat->chatDameMensajesActuales($codUser);
      while ($regOMA = pg_fetch_assoc($resultadoOMA)) {
         $codigoUs=$regOMA['codusuario'];
         if ($codigoUs==$codUser) {
            echo "<div class='navbar-right col-lg-11 col-md-11 col-sm-11 col-xs-12 panel chatsend'>
                  <strong>
                     <span class='glyphicon glyphicon-user'></span>
                     ".$this->obtenerNombreUsuarioChat($codigoUs)."
                  </strong>
                     ".$regOMA['fecha']."
                     ".$regOMA['hora']."
                     <br/>
                  ".$regOMA['contenido']."
                  </div>";
         }
         else{
            echo "<div class='navbar-left col-lg-11 col-md-11 col-sm-11 col-xs-12 panel panel-primary chatreceive'>
                  <strong>
                     <span class='glyphicon glyphicon-user'></span>
                     ".$this->obtenerNombreUsuarioChat($codigoUs)."
                  </strong>
                     ".$regOMA['fecha']."
                     ".$regOMA['hora']."
                     <br/>
                  ".$regOMA['contenido']."
               </div>";
         }
      }
   }
}
?>

















