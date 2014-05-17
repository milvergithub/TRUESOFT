<?php
/**
 * @author milver
 */
include 'ConexionTIS.php';
class Acceso {
    private $conexion;
    private $usuario;
    private $contrasena;
    function __construct($us,$pass) {
        $this->conexion=new ConexionTIS();
        $this->usuario=$us;
        $this->contrasena=$pass;
    }
    public function existeUsuario() {
        $respuesta=  $this->conexion->validarUsuario($this->usuario, $this->contrasena);
        $resp=FALSE;
        while ($reg = pg_fetch_assoc($respuesta)) {
            $valor=$reg['verificarusuario'];
        }
        if ($valor=='t') {
            $resp=TRUE;
        }
        return $resp;
    }
    public function getCodUsuario() {
       $rescodus=  $this->conexion->getCodUsuario($this->usuario);
       while ($regc = pg_fetch_assoc($rescodus)) {
          $rescu=$regc['coduser'];
       }
       return $rescu;
    }
    public function getNombreUsuario($codUser) {
       $resultadoDNU=  $this->conexion->dameNombreUsuario($codUser);
       while ($regDNU = pg_fetch_assoc($resultadoDNU)) {
          $resDNU=$regDNU['nombre'];
       }
       return $resDNU;
    }
}
?>
