<?php
        
        include 'clases/config.php';
        $conf = new config();
    ?>  

    <h1>Configuracion</h1>
    <div>
        <h2>Cambiar Horario Docentes</h2>
            <table>
                <tr> 
                <th>Nombre Docente</th><th>Grupo</th><th>Dia</th><th>Hora</th>
                </tr>
                <?php $conf->obtenerDatosDoc(); ?>
                
            </table>
    </div>
    <div>
        <h2>Habilitar/Deshabilitar Docentes</h2>
            <table>
                <tr><th>Docente</th><th>Estado</th></tr>
                <?php $conf->obtenerEstDoc(); ?>
            </table>
    </div>