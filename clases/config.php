<?php
    include 'ConexionTIS.php';
    
class config
{
    private $conex;

    public function __construct() {
        $this->conex=new ConexionTIS();
    }
    
    function obtenerDocentes() {
        $rest = $this->conex->getUsuariosDocente();
        while ($reg = pg_fetch_assoc($rest)) 
        {
            echo '
                        <tr>
                            <td>
                                '.$reg['nombres'].'
                            </td>
                            
                        </tr>';
        }
    }
    function dameCodigoGrupoDocente($codUser) {
       $resultadoDCGD=  $this->conex->dameCodigoGrupoDeDocente($codUser);
       while ($regDCGD = pg_fetch_assoc($resultadoDCGD)) {
          $resDCGD=$regDCGD['codgrupo'];
       }
       return $resDCGD;
    }
    function obtenerDatosDoc() {
        $rest = $this->conex->datosDoc();
        while ($reg = pg_fetch_assoc($rest)) {
            echo '<tr>
                <form  class="form col-lg-6" action="php/configUsuarioHorarioDoc.php" method="post">
                  <td>
                      '.$reg['nombre'].'
                  <input type="hidden" name="codhora" value="'.$reg['cod_hora'].'">
                  <input type="hidden" name="grupo" value="'.$reg['grupo'].'">
                  </td>
                  <td>
                      '.$reg['grupo'].'
                  </td>
                  <td>
                     <select class="form-control col-lg-6" name="dia">
                      <option value="'.$reg['dia'].'" selected>'.$reg['dia'].'</option>
                      <option value="lunes" >lunes</option>
                      <option value="martes">martes</option>
                      <option value="miercoles">miercoles</option>
                      <option value="jueves">jueves</option>
                      <option value="viernes">viernes</option>
                      <option value="sabado">sabado</option>
                  </select>
                      </td>
                  <td>
                  <select class="form-control" name="hora">
                     <option value="'.$reg['hora'].'" selected>'.$reg['hora'].'</option>
                     <option value="06:45:00">06:45:00 - 08:15:00</option>
                     <option value="08:15:00">08:15:00 - 09:45:00</option>
                     <option value="09:45:00">09:45:00 - 11:15:00</option>
                     <option value="11:15:00">11:15:00 - 12:45:00</option>
                     <option value="12:45:00">12:45:00 - 14:15:00</option>
                     <option value="14:15:00">14:15:00 - 15:45:00</option>
                     <option value="15:45:00">15:45:00 - 17:15:00</option>
                     <option value="17:15:00">17:15:00 - 18:45:00</option>
                     <option value="18:45:00">18:45:00 - 20:15:00</option>
                     <option value="20:15:00">20:15:00 - 21:45:00</option>
                  </select>
                  </td>
                  <td>
                     <input class="btn btn-primary" type="submit" value="Cambiar" />
                  </td>
               </form>

            </tr>
                   ';
        }
    }
    function obtenerEstDoc() {
        $rest = $this->conex->getEstadoDoc();
        while ($reg = pg_fetch_assoc($rest)) 
        {
            
            if ($reg['estado']=='t') {
                $est='habilitado';
                $conf='Deshabilitar';
            }  else {
                $est='deshabilitado';
                $conf='Habilitar';
            }
            echo '
                  <tr>
                  <form action="php/configUsuarioEstadoDoc.php" method="post">
                      <td>
                          '.$reg['nombre'].'
                          <input type="hidden" name="cuenta" value="'.$reg['cuenta'].'">
                      </td>
                      <td>
                          '.$est.'
                          <input type="hidden" name="estado" value="'.$est.'">
                      </td>
                      <td>
                          <input class="btn btn-link" type="submit" value="'.$conf.'" />
                      </td>
                      </form>
                  </tr>';
        }
    }
    //dado la ultima gestion da las grupo empresas
    function getGrupoComp($codUser) {
        $res = $this->conex->grupoEmpresaRepre($codUser);
        while ($reg = pg_fetch_assoc($res)) {
            echo '
                  <tr>
                      <td>
                        <input type="hidden" value="'.$reg['estado'].'" name="estado"/>
                          '.$reg['nombreemp'].'
                      </td>
                      <td>
                          '.$reg['representante'].'
                      </td>
                      <td>
                          <a href="php/saveConfigEstadoGE.php?codContrato='.$reg['codcontrato'].'&estado='.$reg['estado'].'">'.$this->dameFormatoEstado($reg['estado']).'</a>
                      </td>
                  </tr>';
        }
    }
    function dameFormatoEstado($estado) {
       if ($estado=="t") {
          return "Deshabilitar";
       }
       else{
          return "Habilitar";
       }
    }
    function dameFechaActualLimiteEntregaPartes($coduser) {
       $resultadoDFALEP=  $this->conex->dameFechaActualPresentacion($coduser);
       while ($regDFALEP = pg_fetch_assoc($resultadoDFALEP)) {
          echo '<input class="form-control" type="text" value="'.$regDFALEP['fecha'].'" name="fecha" />
                <input type="hidden" name="fechaactual" value="'.$regDFALEP['fecha'].'" id="fechaactual" />
                <input type="hidden" name="codigoconv" value="'.$regDFALEP['codconv'].'" id="codigoconv" />'
              . '<input type="hidden" name="codgrupo" value="'.$regDFALEP['codgrupo'].'" id="codgrupo" /> ';
       }
       return $resDFALEP;
    }
    function dameFechaActualLimiteEntregaDocumen($coduser) {
       $resultadoDFALED=  $this->conex->dameFechaActualDocumentacion($coduser);
       while ($regDFALED = pg_fetch_assoc($resultadoDFALED)) {
          echo '<input class="form-control" type="text" value="'.$regDFALED['fecha'].'" name="fechaAA" />
                <input type="hidden" name="fechaA" value="'.$regDFALED['fecha'].'" id="fechaA" />
                <input type="hidden" name="codconv" value="'.$regDFALED['codconv'].'" id="codconv" />
                <input type="hidden" name="codgrupo" value="'.$regDFALED['codgrupo'].'" id="codgrupo" />';
       }
       return $resDFALED;
    }
}
?>
 


