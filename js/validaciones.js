$(function(){
   /*VALIDACION DEL FORMULARIO CREAR DOCUMENTO DE ENTREGA*/
   $("#formularioCrearDocEntrega").validate({
      rules:{
         nombre :{
            required:true,
            minlength:3,
            maxlength:25
         },
         calificacion :{
             required:true,
             number:true
         },
         archivo :{
             required:false
         },
         tipo: {  // <-- this is the name attribute
              required: true
         }
      },
      messages: {
         nombre :{
            required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">Ingrese un nombre</p>',
            minlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como minimo 3 caracteres</p>',
            maxlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como maximo de 25 caracteres</p>'
         },
         calificacion :{
            required:'<p style="color: rgba(170, 0, 0, 0.76)">Ingrese una nota</p>',
            number:'<p style="color: rgba(170, 0, 0, 0.76)">Debe ser numero</p>'
         },
         archivo :{
            required:false
         },
         tipo: {  // <-- this is the name attribute
            required: "<p style='color: rgba(170, 0, 0, 0.76)'>Selecione un tipo</p>"
         }
      },
      submitHandler:function(form){
    var dataString = 'nombre='+$('#nombre').val()+'&tipo='+$('#tipo').val()+'&calificacion='+$('#calificacion').val()+'&documento='+$('#documento').val();    
            $.ajax({
                type: "POST",
                url:"php/validarDocumentosEntrega.php",
                data: dataString,
                success: function(data){
                    $("#mensajeDocumentos").html(data);
                    $("#mensajeDocumentos").show();
                    //$("#formid").hide();
                }
            });
      },
      highlight: function(element) {
         $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
      },
      success: function(element) {
        element
        .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
      }
   });
   /*VALIDACION DE FORMULARIO REGISTRO DE USUARIO DOCENTE*/
   $('#formularioRegistroDoc').validate({
      rules :{
         nombreuser :{
            required : true, //para validar campo vacio
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 15  //para validar campo con maximo 9 caracteres
         },
         nombres :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 20  //para validar campo con maximo 9 caracteres
         },
         apellidos :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 20  //para validar campo con maximo 9 caracteres
         },
         nrogrupo :{
            required : true,
            number : true   //para validar campo solo numeros
         },
         password :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 16  //para validar campo con maximo 9 caracteres
         },
         emailDoc :{
            required : true, //para validar campo vacio
            email    : true  //para validar formato email
         },
         telefono : {
            required :false,
            number : true,
            minlength : 5, //para validar campo con minimo 3 caracteres
            maxlength : 9  //para validar campo con maximo 9 caracteres
         }
       },
       messages : {
         nombreuser :{
            required : "<p style='color: #b80000'>debe ingresar un nombre de usuario</p>", //para validar campo vacio
            minlength : "<p style='color: #b80000'>El nombre debe tener un minimo de 3 caracteres</p>",
            maxlength : "<p style='color: #b80000'>EL nombre debe tener un maximo de 15 caracteres</p>"
         },
         nombres :{
            required : "<p style='color: #b80000'>debe ingresar un nombre</p>", //para validar campo vacio
            minlength : "<p style='color: #b80000'>El nombre debe tener un minimo de 3 caracteres</p>",
            maxlength : "<p style='color: #b80000'>EL nombre debe tener un maximo de 20 caracteres</p>"
         },
         apellidos :{
            required : "<p style='color: #b80000'>debe ingresar sus apellidos</p>", //para validar campo vacio
            minlength : "<p style='color: #b80000'>El nombre debe tener un minimo de 3 caracteres</p>",
            maxlength : "<p style='color: #b80000'>EL nombre debe tener un maximo de 20 caracteres</p>"
         },
         nrogrupo :{
            required : "<p style='color: #b80000'>debe ingresar un numero para el grupo</p>", //para validar campo vacio
            number : "<p style='color: #b80000'>debe ingresar un numero entero</p>"
         },
         password :{
            required : "<p style='color: #b80000'>debe ingresar su contrasena</p>", //para validar campo vacio
            minlength : "<p style='color: #b80000'>El nombre debe tener un minimo de 3 caracteres</p>",
            maxlength : "EL nombre debe tener un maximo de 16 caracteres</p>"
         },
         emailDoc :{
            required : "<p style='color: #b80000'>debe ingresar un email</p>", //para validar campo vacio
            email    : "<p style='color: #b80000'>debe ingresar un email valido</p>"
         },
         telefono : {
            number : "<p style='color: #b80000'>debe ingresar un numero de telefono</p>",
            minlength : "<p style='color: #b80000'>debe ingresar 5 digitos como minimo</p>",
            maxlength : "<p style='color: #b80000'>debe ingresas como 9 digitos como maximo</p>"
         }
      },
      submitHandler: function(form){
            var dataString = 'nombreuser='+$('#nombreuser').val()+'&nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&nrogrupo='+$('#nrogrupo').val()+'&password='+$('#password').val()+'&emailDoc='+$('#emailDoc').val()+'&telefono='+$('#telefono').val();    
            $.ajax({
                type: "POST",
                url:"php/validarRegistroDoc.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    //$("#formid").hide();
                }
            });
      },
      highlight: function(element) {
         $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
      },
      success: function(element) {
        element
        .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
      }
   });    
});