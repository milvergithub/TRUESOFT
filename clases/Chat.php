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
   function obtenerForosActuales() {
      $resultadoDFA=$this->conexionChat->foroDameForos();
      while ($regForo = pg_fetch_assoc($resultadoDFA)) {
         echo '<div class="col-lg-12 panel foro">
                  <b><span class="glyphicon glyphicon-user"></span>'.$regForo['usuario'].'</b>'.$regForo['fecha'].' '.$regForo['hora'].'<br/> 
                  '.$regForo['comentario'].'<br/>
                     archivo anexo
                     <span class="glyphicon glyphicon-hand-right h4"></span>
                  '.$this->dameAnexoValido($regForo['anexo']).'
               </div>
               ';
      }
   }
   function dameAnexoValido($param) {
      if (trim($param)=="files/foro/archivoForo") {
         return '<a class="btn btn-link" >Sin archivo <span class="glyphicon glyphicon-download-alt"></span></a>';
      }
      else{
         return '<a class="btn btn-link" href="'.$param.'">Download <span class="glyphicon glyphicon-download-alt"></span></a>';
      }
   }
   
}
?>

















