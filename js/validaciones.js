$(function(){
    var elementosNota=document.getElementsByName("formularioEvaluacionIndividual");
    for (x=0;x<elementosNota.length;x++){
        $("#formularioEvaluacionIndividual"+(x+1)).validate({
            rules:{
                nota:{
                    required:true,
                    number:true
                }
            },
            messages:{
                nota:{
                    required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese una nota</p>',
                    number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">Ingrese un numero</p>'
                }
            }
        });
    }
   /*VALIDACION DEL FORMULARIO CREAR DOCUMENTO DE ENTREGA  form[id^='formularioEvaluacionIndividual']*/
    $("#formularioRegistroRep").validate({
       rules:{
           nombreuser: {
               required:true,
               minlength:3,
               maxlength:25
           },
           grupo:{
               required:true
           },
           nombres:{
               required:true,
               minlength:3,
               maxlength:25
           },
           apellidos:{
               required:true,
               minlength:3,
               maxlength:25
           },
           password:{
               required:true,
               minlength:3,
               maxlength:16
           },
           email:{
               email:true
           },
           telefono:{
               number:true,
               minlength:5,
               maxlength:10
           }
       },
       messages:{
           nombreuser: {
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese nombre de usuario</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">mas de 3 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">menor a 25 caracteres</p>'
           },
           grupo:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">seleciona un grupo</p>'
           },
           nombres:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese su nombre</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 3 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 25 caracteres</p>'
           },
           apellidos:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese apellidos</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 3 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 25 caracteres</p>'
           },
           password:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese su contrasena</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 3 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 25 caracteres</p>'
           },
           email:{
               email:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">email no es valido</p>'
           },
           telefono:{
               number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese numeros</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 5 digitos</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 10 digitos</p>'
           }
       },
        submitHandler:function(form){
            var datos =new FormData();
            datos.append("nombreuser",$("#nombreuser").val());
            datos.append("grupo",$("#grupo").val());
            datos.append("nombres",$("#nombres").val());
            datos.append("apellidos",$("#apellidos").val());
            datos.append("password",$("#password").val());
            datos.append("email",$("#email").val());
            datos.append("telefono",$("#telefono").val());
            $.ajax({
                type: "POST",
                url:"php/validarRegistroRep.php",
                enctype:'multipart/form-data',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeRegistroRepresentante").html(data);
                    $("#mensajeRegistroRepresentante").show();
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
    $("#formularioCrearConvocatoria").validate({
      rules:{
         nombreconv: {
            required:true,
            minlength:3,
            maxlength:25
         },
         fecha:{
            required:true,
            date:true
         }
      },
      messages: {
         nombreconv :{
            required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">Ingrese un nombre</p>',
            minlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como minimo 3 caracteres</p>',
            maxlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como maximo de 25 caracteres</p>'
         },
         fecha :{
            required:'<p style="color: rgba(170, 0, 0, 0.76)">Ingrese una fecha</p>',
            date:'<p style="color: rgba(170, 0, 0, 0.76)">Formato invalido</p>'
         }
      },
      submitHandler:function(form){
         var dataString = 'nombreconv='+$('#nombreconv').val()+'&fecha='+$('#fechai').val();    
         $.ajax({
             type: "POST",
             url:"php/subirCrearConvocatoria.php",
             data: dataString,
             success: function(data){
                 $("#mensajeRegistroConvocatoria").html(data);
                 $("#mensajeRegistroConvocatoria").show();
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
   $("#formularioCrearDocLectura").validate({
      rules:{
         nombredoc:{
            required:true,
            minlength:3,
            maxlength:25
         },
         archivo:{
            required:true
         }
      },
      messages: {
         nombredoc :{
            required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">Ingrese un nombre</p>',
            minlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como minimo 3 caracteres</p>',
            maxlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como maximo de 25 caracteres</p>'
         },
         archivo :{
            required:'<p style="color: rgba(170, 0, 0, 0.76)">Cargue un archivo</p>'
         }
      },
      submitHandler:function(form){
          var nombre=$("#nombredoc").val();
          var archivoDato = new FormData();
          archivoDato.append( 'archivo', $( '#archivo' )[0].files[0] );
          archivoDato.append("nombredoc",nombre);
            $.ajax({
                type: "POST",
                url:"php/subirDocumentoConv.php",
                enctype:'multipart/form-data',
                data: archivoDato,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeDocumentosLectura").html(data);
                    $("#mensajeDocumentosLectura").show();
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
         var archivoDato = new FormData();
         archivoDato.append("nombre",$('#nombre').val());
         archivoDato.append("tipo",$('#tipo').val());
         archivoDato.append("calificacion",$('#calificacion').val());
         archivoDato.append("documento",$('#documento')[0].files[0]);
         $.ajax({
             type: "POST",
             url:"php/validarDocumentosEntrega.php",
             enctype:'multipart/form-data',
             data: archivoDato,
             cache: false,
             contentType: false,
             processData: false,
             mimeType: 'multipart/form-data',
             success: function(data){
                 $("#mensajeDocumentos").html(data);
                 $("#mensajeDocumentos").show();
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