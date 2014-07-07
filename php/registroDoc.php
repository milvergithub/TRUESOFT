<div class="row">
   <div class="container container-fluid center-block">
      <div class="panel titulo">
         <h2>Registro de Usuario-Docente</h2>
         <h4>(*) Requerimientos importantes</h4>
      </div>
      <div id="ok" class=" container container-fluid"></div>
      <form class="form-group col-md-6 col-lg-6 panel panel-body well" action="php/validarRegistroDoc.php" method="post" id="formularioRegistroDoc">
         <div class="control-group">
            <span class="glyphicon glyphicon-user">Usuario:  </span> *  
            <input class="form-control input-sm" type="text" name="nombreuser" id="nombreuser"/>  		
         </div>
         <div class="control-group">
            <span class="glyphicon"> Nombres: </span> *
            <input class="form-control input-sm" type="text" name="nombres" id="nombres"/>
         </div>
         <div class="control-group">
            <span class="glyphicon"> Apellidos: </span> *
            <input class="form-control input-sm" type="text" name="apellidos" id="apellidos"/>
         </div>
         <div class="control-group">
            <span class="glyphicon" > NroGrupo</span> *
            <select class="form-control" name="nrogrupo" id="nrogrupo">
               <?php
               include_once 'php/GruposDisponibles.php';
               ?>
            </select>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-lock">Password: </span> *
            <input class="form-control input-sm" type="password" name="password" id="password"/>
         </div>
         <div class="control-group">
            <span class="glyphicon">Email:</span> 
            <input class="form-control input-sm" type="text" name="emailDoc" id="emailDoc"/>
         </div>
         <div class="control-group">
            <span class="glyphicon glyphicon-phone">Telefono:</span> 
            <input class="form-control input-sm" type="text" name="telefono" id="telefono"/><br/><br/>
         </div>
         <input class="btn btn-primary" type="submit" value="Registrar" />
      </form>
      <?php include 'inc/ayuda.php'; ?>
   </div>
</div>