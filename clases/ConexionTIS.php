<?php
//conexion  a la base de datos
class  ConexionTIS
{
    private $servidor;
    private $puerto;
    private $nombre;
    private $usuario;
    private $clave;
    function __construct()
    {
        $this->servidor="localhost";
        $this->puerto="5432";
        $this->nombre="bdtis";
        $this->usuario="tis";
        $this->clave="tis";
    }
    function Conectar()
    {
        $BaseDato=pg_connect("host=$this->servidor port=$this->puerto dbname=$this->nombre user=$this->usuario password=$this->clave")
                or die ('Error de conexión. Póngase en contacto con el administrador');
        return $BaseDato;
    }
    function Insertar($sqlInsert) {
       $conex=  $this->Conectar();
       if(!$conex)
          echo 'error';
       else {
          pg_query($conex,$sqlInsert);
       }
    }
    function dameNombreUsuario($codUser) {
       $sqlDNU="SELECT * FROM dame_nombre_usuario(".$codUser.") AS nombre";
       $resDNU=  $this->Consultas($sqlDNU);
       return $resDNU;
    }
    
    function Consultas($Consulta)
    {
        $conx=$this->Conectar();
        if(!$conx) return 0; //Si no se pudo conectar
        else
        {   //Valor es resultado de base de dato y Consulta es la Consulta a realizar
            $Resultado=pg_query($conx,$Consulta);
            return $Resultado;// retorna si fue afectada una fila
        }
    }
    function dameHorasPresentacionTotal($codUser) {
       $sqlHPT="SELECT * FROM contarh(".$codUser.")";
       $resHPT=  $this->Consultas($sqlHPT);
       return $resHPT;
    }
    function dameNombreDocenteMiGrupo($codUser) {
       $sqlNDMG="SELECT * FROM dame_NombDocGrupo(".$codUser.")";
       $resNDMG=  $this->Consultas($sqlNDMG);
       return $resNDMG;
    }
    function dameHorasPresentacion($codDia) {
       $sqlDHP="SELECT * FROM gethorapresent(".$codDia.")";
       $resDHP=  $this->Consultas($sqlDHP);
       return $resDHP;
    }
    function dameDiasDeClases($codGrupo) {
       $sqlDDC="SELECT * FROM darhoradiapres(".$codGrupo.")";
       $resDDC=  $this->Consultas($sqlDDC);
       return $resDDC;
    }
    function dameNombreDeLaEmpresa($codUser) {
       $sqlDNE="SELECT * FROM dame_nombreempresa(".$codUser.") AS nombrege";
       $resDNE=  $this->Consultas($sqlDNE);
       return $resDNE;
    }
    function registroEmpresaAndContrato($codRep,$nombre,$logo) {
       $sqlREC="SELECT * FROM registro_empresa_contrato(".$codRep.", '".$nombre."', '".$logo."')";
       $this->Insertar($sqlREC);
    }
    function siYaHizoUnRegistroEmpresa($cod) {
       $sqlSERE="SELECT * FROM verificarcontrato(".$cod.")";
       $resSERE=  $this->Consultas($sqlSERE);
       return $resSERE;
    }
    function codigosRepresentanteEnContrato($codRep) {
       $sqlCodsRep="SELECT codemp FROM codigoscontratorep(".$codRep.")";
       $resCodsRep=  $this->Consultas($sqlCodsRep);
       return $resCodsRep;
    }
    function siYaSeRegistroIntegrantes($codemp){
      $sqlSRI="SELECT * FROM existeintegrantes(".$codemp.") AS existe";
      $resSRI=  $this->Consultas($sqlSRI);
      return $resSRI;
    }
    function getSimilarNombreEmpresa($cadena) {
      $sqlSNGE="SELECT * FROM similarnombrege('".$cadena."')";
      $resSNGE=  $this->Consultas($sqlSNGE);
      return $resSNGE;
    }
    function getUnicoGrupoGE($nomb) {
       $sqlUGE="SELECT * FROM verificar_nomb_ge('".$nomb."') AS unico";
       $resUGE=  $this->Consultas($sqlUGE);
       return $resUGE;
    }
    function getCodigoGrupo($codu){
       try {
          $sqlCU="SELECT * FROM getcodgrupo(".$codu.")";
          $resulCU=  $this->Consultas($sqlCU);
       } catch (Exception $exc) {
          echo $exc->getTraceAsString();
       }

       return $resulCU;
    }
    function getGruposDoc($grupo){
        $resultado= $this->Consultas("SELECT * FROM getgrupoempresas(".$grupo.");");
        $cantidad=  pg_affected_rows($resultado);
        while ($row = pg_fetch_assoc($resultado)) {
            
            ?><article style="background-image: url( <?php echo $row["logoemp"]; ?>)" class="grupo-empresa"><?php
                    echo $row['grupodoc']."<br>";
                    echo "<section class='centro'>".$row['nombreemp']."</section>";
                    echo '<article class="representante">'.$this->getRepresentante($row["codemp"]).'</article>';
                    if ($this->evaluado($row['codemp'])=='t') {
                       echo '<a href="seguimiento.php?'.md5("codEmpH").'='.$row["codemp"].'" class="btn btn-success btn-sm btn-left" id="detallege">asistencias</a>';
                       echo '<button class="btn btn-success btn-sm btn-right" id="detalle">evaluado</button>';
                    }
                    else{
                       //echo '<a href="historialseguimiento.php?'.md5("codEmp").'='.$row["codemp"].'" class="btn btn-success btn-sm btn-left" id="detallege">asistencias</a>';
                       echo '<a href="seguimiento.php?'.md5("codEmp").'='.$row["codemp"].'" class="btn btn-primary btn-sm btn-right" id="detalle">evaluar empresa</a>';
                    }
            ?></article><?php
        }
    }
    function evaluado($codemp) {
       $sqlEval="SELECT * FROM evaluacionunica(".$codemp.");";
       $respuest=  $this->Consultas($sqlEval);
        $res='f';
       while ($reg=  pg_fetch_assoc($respuest)) {
          $res=$reg['evaluacionunica'];
       }
       return $res;
    }
    //SELECT * FROM getrepresentante(500)
    function getRepresentante($codEmp) {
        $resultadoResp= $this->Consultas("SELECT * FROM getrepresentante(".$codEmp.");");
        while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp=$reg['nombreusuario'];
        }
        return $resp;
    }
    function getRol($p) {
       $respR=  $this->Consultas("SELECT * FROM getrol(".$p.")");
       return $respR;
    }
    function getDdate() {
       $resDate=  $this->Consultas("SELECT * FROM getfechaactual()");
       return $resDate;
    }
    function getUsuarioDocente($codUser) {
       try {
          $resultadoResp= $this->Consultas("SELECT * FROM getUsuarioDocente(".$codUser.");");
          while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp=$reg['nombreusuario'];
          }
       } catch (Exception $exc) {
          echo 'error 404';
       }

       return $resp;
    }
    function validarUsuario($us,$pass) {
        $sqlVal="SELECT * FROM verificarusuario('".$us."','".$pass."')";
        $respVal=  $this->Consultas($sqlVal);
        return $respVal;
    }
    function getCodUsuario($us) {
       $sqlCod="SELECT * FROM getcoduser('".$us."');";
       $resCod=  $this->Consultas($sqlCod);
       return $resCod;
    }
    function getIntegrantesRepresentante($codEmp) {
       try {
          $sqlIntRep="SELECT * FROM getintegrantes(".$codEmp.");";
          $respIntRep=  $this->Consultas($sqlIntRep);
       } catch (Exception $exc) {
          echo $exc->getTraceAsString();
       }

       return $respIntRep;
    }
    function evaluarIntegrantes($codsInt,$asist,$lic,$part,$just,$nota,$obs,$cant,$codEmp){
       $cantidad=$cant;
       for ($set = 0; $set < $cantidad; $set++) {         //( codint         ,    asist        ,    lic        ,     justf        , part           ,    nt          , obs)
          $sqlI="SELECT * FROM insertar_reunion_evaluativa(".$codsInt[$set].", ".$asist[$set].", ".$lic[$set].", '".$just[$set]."', ".$part[$set].", ".$nota[$set].",'".$obs[$set]."')";
          $this->Insertar($sqlI);
       }
    }
    function registrarIntegrantes($nombGE,$nombres,$cis,$telfs,$emails,$fotos) {
       $sqlRGEI="SELECT * FROM registro_integrantes('".$nombGE."',".$nombres.",".$cis.",".$telfs.",".$emails.",".$fotos.")";
       $ress=$this->Insertar($sqlRGEI);
    }
    function getEmpresas() {
       $sqlEmp="SELECT * FROM getempresastodos()";
       $resEmp=  $this->Consultas($sqlEmp);
       return $resEmp;
    }
    /*********************************   INICIO REGISTRO REPRESENTANTE DOCENTE  *********************************** */
    
    function registrarUsuarioRepresentante($codGrupo,$cuenta,$pass,$nombres,$telf,$email) {
       $sqlRUR="SELECT * FROM registrar_representante(".$codGrupo.",'".$cuenta."','".$pass."','".$nombres."',".$telf.",'".$email."')";
       $this->Insertar($sqlRUR);
    }
    function dameDocentesActivos() {
       $sqlDDA="SELECT * FROM dametododocenteactivos()";
       $resDDA=  $this->Consultas($sqlDDA);
       return $resDDA;
    }
    function usuarioUnico($cadena) {
       $sqlUU="SELECT * FROM validad_usuario_unico('".$cadena."') AS valido;";
       $resUU=  $this->Consultas($sqlUU);
       return $resUU;
    }
    function emailUnico($cadena) {
       $sqlEU="SELECT * FROM email_unico('".$cadena."') AS unico";
       $resEU=  $this->Consultas($sqlEU);
       return $resEU;
    }
    function verificandoGrupo($numGrupo) {
       $sqlVGU="SELECT * FROM verificar_grupo(".$numGrupo.") AS unicog";
       $resVGU=  $this->Consultas($sqlVGU);
       return $resVGU;
    }
    function registrarUsuarioDoc($grupo, $usuariod, $pass, $nombres,$telefono,$emailDoc){
       $sqlRD="SELECT * FROM registrar_docente(".$grupo.", '".$usuariod."','".$pass."','".$nombres."',".$telefono.",'".$emailDoc."')";
       $this->Insertar($sqlRD);
    }
    //**********************************   FINAL  REGISTRO REPRESENTANTE DOCENTE  ************************************
    
    
    // estas son mis funciones para la parte de vista general de la empresa ---------------------------------------------------
    function getIntegrantes($codemp)
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM getintegr(".$codemp.");");
        //$resp = pg_affected_rows($resultadoResp);
       while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['getintegr'];
            $cont=$cont+1;
        }
        
        return $resp;
    }
    function dameIntegrantesEmpresa($codEmp) {
       $sqlDIE="SELECT * FROM dame_integrantes_empresa(".$codEmp.")";
       $resultadoDIE=  $this->Consultas($sqlDIE);
       return $resultadoDIE;
    }

    function getNroIntegrante($codemp)
    {
        $resp;
        $resultadoResp= $this->Consultas("SELECT * FROM getNroIntegr(".$codemp.");");
        while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp=$reg['getnrointegr'];
        }
        return $resp;
    }
    
    function getNroReuniones($codemp)
    {
        $resp;
        $resultadoResp= $this->Consultas("SELECT * FROM getnroreuniones(".$codemp.");");
        while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp=$reg['getnroreuniones'];
        }
        return $resp;
    }
    
    function  getFechaReuniones($codemp)
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM getfechasreunion(".$codemp.");");
        while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['getfechasreunion'];
            $cont=$cont+1;
        }
        return $resp;
    }
    
    
    // para el control --------------------------
   
    function getCodIntegrant($codemp)
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM darcodintegrante(".$codemp.");");
        //$resp = pg_affected_rows($resultadoResp);
       while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['codint'];
            $cont=$cont+1;
        }
        
        return $resp;
    }
    
    function getAsistXfecha($codinteg, $fech)
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM getasistxfech(".$codinteg.", '".$fech."');");
        //$resp = pg_affected_rows($resultadoResp);
       while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['asistencia'];
            $cont=$cont+1;
        }
        
        return $resp;
    }
   /*==============================================================================================*/
    /*================================    GESTION ARCHIVOS    ==================================**/
    
    /*********************************  INICIO GESTION DOCUMENTOS  *********************************/
    function dameDocumentosSubidosPorLaConvocatoria($codConv) {
       $sqlDDSC="SELECT * FROM dame_documento_por_conv(".$codConv.")";
       $resDDSC=  $this->Consultas($sqlDDSC);
       return $resDDSC;
    }
    function  subirDocumentos($codConv, $nombDoc, $codTip, $notaDoc, $rutaDoc)
    {
        
        $this->Insertar("SELECT * FROM insetardocumentosconv(".$codConv.", '".$nombDoc."', ".$codTip.", ".$notaDoc.", '".$rutaDoc."');");
    }
    function dameDocumetosPresentacion() {
       $sqlDDP="SELECT * FROM dametipospresentacion()";
       $resDDP=  $this->Consultas($sqlDDP);
       return $resDDP;
    }
    function verificarDocumentoUnico($codConv,$nombre) {
       $sqlVDU="SELECT * FROM verificarnombreunicoconvocatoria(".$codConv.",'".$nombre."') AS existe";
       $resVDU=  $this->Consultas($sqlVDU);
       return $resVDU;
    }
    function obtenerNotaTotalConv($codConv) {
       $sqlONTC="SELECT * FROM verificarNotaDocumento(".$codConv.") AS notatotal";
       $resONTC=  $this->Consultas($sqlONTC);
       return $resONTC;
    }
    /*********************************  FINAL  GESTION DOCUMENTOS  *********************************/
    /**/
    /*********************************  EVALUACION DE ARCHIVOS GE  ********************************/
    
    function obtenerEmpresasParaEvaluarArchivos($codGrupo) {
       $sqlOEPEA="SELECT * FROM getgrupoempresas(".$codGrupo.")";
       $resOEPEA=  $this->Consultas($sqlOEPEA);
       return $resOEPEA;
    }
    function obtenerCodigosApartirDeCodEmp($codEmp) {
       $sqlOCADCE="SELECT codconv FROM dame_cods_contrato_empresa(".$codEmp.")";
       $resOCADCE=  $this->Consultas($sqlOCADCE);
       return $resOCADCE;
    }
    function obtenerArchivosEntregados($codEmp) {
       $sqlOAE="SELECT * FROM devolverarchivosempresa(".$codEmp.")";
       $resultadoOAE=  $this->Consultas($sqlOAE);
       return $resultadoOAE;
    }
    /*********************************  EVALUACION DE ARCHIVOS GE  ********************************/
    
    /*********************************  SUBIDA DE ARCHIVOS Y CONFIGURAION *************************/
    // funcion para insetar documentos de la empresa en la base de datos -----------------------------------------------------------------------
    function  insetarDocumentos($codrep, $nombDocument, $rutaDocunent, $partedocument)
    {
        $this->Insertar("SELECT * FROM insertardocumentos(".$codrep.", '".$nombDocument."','".$rutaDocunent."','".$partedocument."');"); 
    }
    
    function  getCodEmpresa($codrep)
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM codigoscontratorep(".$codrep.");");
        //$resp = pg_affected_rows($resultadoResp);
       while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['codemp'];
            $cont=$cont+1;
        }
        return $resp;
    }
            
    // funcion para insertar comvocatoriasss----------------------------
    function insetarAnexosConv($codConv, $rutaConv)
    {
        $this->Insertar("SELECT * FROM insertandoanexoconvocat(".$codConv.", '".$rutaConv."');");
    } 
    
    function  insetarAnexoPliego($codConv, $rutaPlieg)
    {
        $this->Insertar("SELECT * FROM insertandoanexopliego(".$codConv.", '".$rutaPlieg."');");
    }
    
    // funcion para la creacion  de la prepropuesta
    function  insertarConvocatoria($nombConv, $fechaPrepConv)
    {
        $this->Insertar("SELECT * FROM anadirConvocatoria('".$nombConv."', '".$fechaPrepConv."');");
    }
    
    function  getFechaActual()
    {
        $resp;
        $cont=0;
        $resultadoResp= $this->Consultas("SELECT * FROM getfechaactual();");
        //$resp = pg_affected_rows($resultadoResp);
       while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp[$cont]=$reg['getfechaactual'];
            $cont=$cont+1;
        }
        return $resp;
    }
    function  dameDocumentosLectura($codConv)
    {
        $sqlDDL="SELECT * FROM devolvemedocdectura(".$codConv.");";
        $resDDL=  $this->Consultas($sqlDDL);
        return $resDDL;
    }
    
    // funcion para devolver los documentos para la subida de la comvocatoria
    function darDocumnetoSubir($codConv) {
        $sqlDDS="SELECT * FROM damedocumentos(".$codConv.");";
        $resDDS= $this->Consultas($sqlDDS);
        return $resDDS;
    }
    
    function insertarArchivosEmp($codEmp, $codGest, $codConv, $codDoc, $nombre, $ruta, $parte) {
        $sqlIAE= "SELECT * FROM insertararchivoemp(".$codEmp.", ".$codGest.", ".$codConv.", ".$codDoc.", '".$nombre."', '".$ruta."', '".$parte."');";
        $this->Insertar($sqlIAE);
    }
    // para configurar notas de los documentos
    function configuracionNotasDocumento($codUs, $codDoc, $nota) {
        $sqlCND= "SELECT * FROM configurarnotadocumeentos(".$codUs.", ".$codDoc.", ".$nota.");";
        $resCND= $this->Consultas($sqlCND);
        return $resCND;
    }
    //funcion para devolver archivos de la empresa
    function devolverArchivosEmpresa($codEmp) {
        $sqlDAE= "SELECT * FROM devolverarchivosempresa(".$codEmp.");";
        $resultDAE= $this->Consultas($sqlDAE);
        return $resultDAE;
    }
    //funcion para la evaluacion grupal de archivos
    function insertarEvaluacionGrupal($codEmp, $codArch, $nota) {
        $sqlIEG = "SELECT * FROM insertarevaluaciongrupal(".$codEmp.", ".$codArch.", ".$nota.");";
        $this->Insertar($sqlIEG);
    }
}
//fin clase conexion
?>
