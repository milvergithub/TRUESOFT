
<div class="table table-responsive panel panel-default panelaso">
   <div class="panel titulo">
      <h2><b>Configuracion Semestral</b></h2>
   </div>
   <div id="mensajeConfigSemestral">
      
   </div>
   <form class="form" id="formularioSettingsSemestral" method="POST">
        <table class=" table table-hover">
           <caption class="panel subtitulo"><h4><b>Configuracion De Nro. De Integrantes Para Cada Grupo</b></h4></caption>
            <tr>
                <td>
                    <span class="glyphicon"><h5><b>NRO. MINIMO INTEGRANTES</b></h5></span>
                </td>
                <td>
                    <span class="glyphicon"><h5><b>NRO. MAXIMO INTEGRANTES</b></h5></span>
                </td>
            </tr>
            <tr>
                <td>
                   <input class="form-control numerico" type="text" name="nromin" id="nromin" placeholder="nro. minimo"/> 
                </td>
                <td>
                   <input class="form-control numerico" type="text" name="nromax" id="nromax" placeholder="nro. maximo"/> 
                </td>
                
            </tr>
            
        </table>
        <table class=" table table-hover">
           <caption class="panel subtitulo"><h4><b>Configuracion De Primeras Presentaciones</b></h4></caption> 
           <tr>
                <td>
                    <span class="glyphicon"><h5><b>NOTA PRESENTACION PROPUESTA</b></h5></span>
                </td>
                <td>
                    <span class="glyphicon"><h5><b>NOTA REUNION EVALUATIVO</b></h5></span>
                </td>
                
                <td>
                    <span class="glyphicon"><h5><b>NOTA FINAL TOTAL</b></h5></span>
                </td>
            </tr>
            
            <tr>
                <td>
                   <input class="form-control numerico" type="text" name="notaPres" id="notaPres" placeholder="nota propuesta"/> 
                </td>
                <td>
                   <input class="form-control numerico" type="text" name="notaReum" id="notaReum" placeholder="nota reunion"/> 
                </td>
                <td>
                   <input class="form-control numerico" type="text" name="notaTotal" id="notaTotal" placeholder="nota total"/> 
                </td>
            </tr>
            
        </table>
        <table class=" table table-hover">
           <caption class="panel subtitulo"><h4><b>Configuracion Segunda Presentacion</b></h4></caption> 
           <tr>
                <td>
                    <span class="glyphicon"><h5><b>NOTA DOCUMENTACION FINAL</b></h5></span>
                </td>
                <td>
                    <span class="glyphicon"><h5><b>NOTA DEFENSA PROYECTO</b></h5></span>
                </td>
                
            </tr>
            
            <tr>
                <td>
                   <input class="form-control numerico" type="text" name="notaDocum" id="notaDocum" placeholder="nota documentacion"/> 
                </td>
                <td>
                   <input class="form-control numerico" type="text" name="notaDef" id="notaDef" placeholder="nota defensa"/> 
                 </td>
            </tr>
            
        </table>
        
        <input class="btn btn-primary btn-sm" type="submit" value="Guardar configuracion"/>
    </form>
</div>

