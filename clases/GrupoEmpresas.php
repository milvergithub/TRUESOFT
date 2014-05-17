<?php
include "ConexionTIS.php";
class GrupoEmpresa {
    private $coneccion;
    function __construct() {
        $this->coneccion=new ConexionTIS();
    }
    public function dameNombreEmpresa($codUser) {
       $resultadoDNE=  $this->coneccion->dameNombreDeLaEmpresa($codUser);
       while ($regDNE = pg_fetch_assoc($resultadoDNE)) {
          $resDNE=$regDNE['nombrege'];
       }
       return $resDNE;;
    }
    public function getSimilarEmpresas($cadena) {
       $resultadoSE=  $this->coneccion->getSimilarNombreEmpresa($cadena);
       while ($regSE = pg_fetch_assoc($resultadoSE)) {
           echo '<tr><td>'.$regSE['gestion'].'</td><td>'.$regSE['conv'].'</td><td>'.$regSE['nombre'].'</td><td><img src="'.$regSE['logo'].'" class="img-responsive col-sm-2 col-md-2"></td></tr>';
       }
    }
    public function siYaRegistroEmpresa($codUser) {
       $resultadoSYRE=  $this->coneccion->siYaHizoUnRegistroEmpresa($codUser);
       while ($row = pg_fetch_assoc($resultadoSYRE)) {
          $resSYRE=$row['verificarcontrato'];
       }
       return $resSYRE;
    }
    public function codigosRepEnContrato($codRep) {
       $resultadoCDSR=  $this->coneccion->codigosRepresentanteEnContrato($codRep);
       while ($row = pg_fetch_assoc($resultadoCDSR)) {
          $resCDSR=$row['codemp'];
       }
       return $resCDSR;
    }
    public function siYaSeRegistroIntegrantes($codemp) {
       $resultadoSRI=  $this->coneccion->siYaSeRegistroIntegrantes($codemp);
       while ($row = pg_fetch_assoc($resultadoSRI)) {
          $resSRI=$row['existe'];
       }
       return $resSRI;
    }
    public function getGrupoEmpresas($codus) {
        $codg=  $this->getCodGrupo($codus);
        $this->coneccion->getGruposDoc($codg);
    }
    public function getCodGrupo($coduser) {
       $resultadoCodG=  $this->coneccion->getCodigoGrupo($coduser);
       while ($row = pg_fetch_assoc($resultadoCodG)) {
          $resCG=$row['codgrupo'];
       }
       return $resCG;
    }
    public function getNombreDocente($codUs) {
        $resp=$this->coneccion->getUsuarioDocente($codUs);
        return $resp;
    }
    public function getFecha() {
       $resultD=  $this->coneccion->getDdate();
       while ($reg = pg_fetch_assoc($resultD)) {
          $dato=$reg['getfechaactual'];
       }
       return $dato;
    }
    public function dameIntegrantes($cod) {
        $resultado=  $this->coneccion->getIntegrantesRepresentante($cod);
        $contador=1;
            while ($reg = pg_fetch_assoc($resultado)) {
                echo "<tr><td><input type='hidden' value='".$reg["codint"]."' name='codint".$contador."' ></td><td>".$reg["nombre"]."</td>
                    <td><input value='1' checked='true' type='checkbox' name='asistencia".$contador."' id='cba".$contador."' onclick='clickAsistencia(".$contador.")'></td>
                    <td><input type='checkbox' name='licencia".$contador."' id='cbl".$contador."' onclick='clickLicencia(".$contador.")'></td>
                    <td><input type='checkbox' name='participacion".$contador."' id='cbp".$contador."' onclick='clickParticipacion(".$contador.")'></td>
                    <td><textarea class='form-control' name='justificacion".$contador."' id='taj".$contador."' disabled='false'></textarea></td>
                    <td><input type='number' min='0' max='100' value='0' name='nota".$contador."' id='nn".$contador."' disabled='false' ></td>
                    <td><textarea class='form-control' name='obs".$contador."' id='tao".$contador."' disabled='false'></textarea></tr>";
                $contador=$contador+1;
            }
            echo "<tr><input type='hidden' name='cantidad' value='".($contador-1)."' ></tr>";
            echo "<tr><td><input type='hidden' value='".$cod."' name='codEmp' ></td></tr>";
    }
    public function getRolUsuario($codUs) {
       $resultRol=  $this->coneccion->getRol($codUs);
       while ($regR = pg_fetch_assoc($resultRol)) {
          $resR=$regR['rol'];
       }
       return $resR;
    }
    public function getUnicoEmpresa($nombre) {
       $resultUGE=  $this->coneccion->getUnicoGrupoGE($nombre);
       while ($regUGE=  pg_fetch_assoc($resultUGE)) {
          $resUGE=$regUGE['unico'];
       }
       return $resUGE;
    }
    public function getGrupoEmpresasTodos() {
       $resulEmp=  $this->coneccion->getEmpresas();
       while ($regEmp = pg_fetch_assoc($resulEmp)) {
          //getEmpresasTodos(gestion,convocatoria,nombre,logo)
          echo '<tr><td>'.$regEmp['gestion'].'</td><td>'.$regEmp['convocatoria'].'</td><td>'.$regEmp['nombre'].'</td><td><img src="img/logos/logo2.jpg" class="img-responsive col-sm-2 col-md-2"></td></tr>';
       }
    }

}
?>