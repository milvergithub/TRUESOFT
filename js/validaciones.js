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
    var elementosFormDoc=document.getElementsByName("formularioSubidaDocumentacion");
    for (z=0;z<elementosFormDoc.length;z++){
       $("#formularioSubidaDocumentacion"+(z+1)).validate({
          rules:{
             archivo:{
                required:true
             }
          },
          messages:{
             archivo:{
                required:'escoger un archivo'
             }
          }
       });
    }
   /*VALIDACION DEL FORMULARIO CREAR DOCUMENTO DE ENTREGA  form[id^='formularioEvaluacionIndividual']*/

    $("#formularioSettingsSemestral").validate({
        rules:{
            nromin:{
                required:true,
                number:true
            },
            nromax:{
                required:true,
                number:true
            },
            notaPres:{
                required:true,
                number:true
            },
            notaReum:{
                required:true,
                number:true
            },
            notaTotal:{
                required:true,
                number:true
            },
            notaDocum:{
                required:true,
                number:true
            },
            notaDef:{
                required:true,
                number:true
            }
        },
        submitHandler:function(form){
            var datoSetting=new FormData();
            datoSetting.append("nromin",$('#nromin').val());
            datoSetting.append("nromax",$('#nromax').val());
            datoSetting.append("notaPres",$('#notaPres').val());
            datoSetting.append("notaReum",$('#notaReum').val());
            datoSetting.append("notaTotal",$('#notaTotal').val());
            datoSetting.append("notaDocum",$('#notaDocum').val());
            datoSetting.append("notaDef",$('#notaDef').val());
            $.ajax({
                type: "POST",
                url:"update/subirConfSem.php",
                enctype:'multipart/form-data',
                data: datoSetting,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeConfigSemestral").html(data);
                    $("#mensajeConfigSemestral").show();
                    bootbox.alert('<div class="alert alert-success">\n\
                                    <b>Numero minimo integrantes </b>:'+$('#nromin').val()+'<br>\n\
                                    <b>Numero maximo integrantes </b>:'+$('#nromax').val()+'<br>\n\
                                    <b>Nota propuestas sobre 100 </b>:'+$('#notaPres').val()+'<br>\n\
                                    <b>Nota seguimiento sobre 100 </b>:'+$('#notaReum').val()+'<br>\n\
                                    <b>Nota documentacion sobre 100 </b>:'+$('#notaDocum').val()+'<br>\n\
                                    <b>Nota defensa sobre 100 </b>:'+$('#notaDef').val()+'<br>\n\
                                    <b>Nota sobre la cual se califica  </b>:'+$('#notaTotal').val()+'<br>\n\
                                   </div>');
                }
            });
        }
    });
    /*
    * =================== PARA EL FORO DE LA PAGINA*/

    $("#formularioSettings").validate({
        rules:{
            cuenta:{
                required:true,
                minlength:3,
                maxlength:10,
                lettersonly:true
            },
            nombres:{
                required:true,
                minlength:3,
                maxlength:30,
                lettersonly:true
            },
            pass:{
                required:true,
                minlength:5,
                maxlength:16,
                lettersNumbersonly:true
            }
        },
        messages:{

        },
        submitHandler:function(form){
            var datoSetting=new FormData();
            datoSetting.append("cuenta",$('#cuenta').val());
            datoSetting.append("nombres",$('#nombres').val());
            datoSetting.append("pass",$('#pass').val());
            $.ajax({
                type: "POST",
                url:"validateSettings.php",
                enctype:'multipart/form-data',
                data: datoSetting,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeSettings").html(data);
                    $("#mensajeSettings").show();
                    $("#cuenta").val("");
                    $("#nombres").val("");
                    $("#pass").val("");
                }
            });
        }
    });

     $("#formularioForo").validate({
        rules:{
            contenidoForo:{
                required:true,
                maxlength:500
            }
        },
        messagesForo:{
            contenido:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">escriba algo</p>',
                maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">tamanio de contenido excedido</p>'
            }
        },
        submitHandler:function(form){
            var datoForo=new FormData();
            datoForo.append("contenidoForo",$('textarea#contenidoForo').val());
            datoForo.append("anexo",$( '#anexo' )[0].files[0]);
            $.ajax({
                type: "POST",
                url:"php/enviarForo.php",
                enctype:'multipart/form-data',
                data: datoForo,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeForoEnvio").html(data);
                    $("#mensajeForoEnvio").show();
                    $("#contenidoForo").val("");
                }
            });
        }
    });
    /* =================== PARA EL FORO DE LA PAGINA*/
    $("#formularioEditDocLect").validate({
       rules:{
           nombre:{
               required:true,
               maxlength:30,
               lettersonly:true
           },
           archivo:{
               required:true
           }
       } ,
       messages:{

       },
       submitHandler:function(form){

       }
    });

    $("#formularioActualizarFechaLimitedocumentacion").validate({
        rules:{
            fechaNN:{
                required:true,
                date:true
            }
        },
        messages:{
            fechaNN:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese una fecha</p>',
                date:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">formato no valido</p>'
            }
        },
        submitHandler:function(form){
            var datoUFD=new FormData();
            datoUFD.append("fechaNN",$('#fechaNN').val());
            datoUFD.append("fechaA",$('#fechaA').val());
            datoUFD.append("codconv",$('#codconv').val());
            datoUFD.append("codgrupo",$('#codgrupo').val());
            $.ajax({
                type: "POST",
                url:"php/updateDateEndDocum.php",
                enctype:'multipart/form-data',
                data: datoUFD,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeUpdateFechaDocum").html(data);
                    $("#mensajeUpdateFechaDocum").show();
                }
            });
        }
    });

    $("#formularioActualizarFechaLimitePropuesta").validate({
        rules:{
            fechaNueva:{
                required:true,
                date:true
            }
        },
        messages:{
            fechaNueva:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese una fecha</p>',
                date:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">formato no valido</p>'
            }
        },
        submitHandler:function(form){
            var datoUF=new FormData();
            datoUF.append("fechaNueva",$('#fechaNueva').val());
            datoUF.append("fechaactual",$('#fechaactual').val());
            datoUF.append("codgrupo",$('#codgrupo').val());
            datoUF.append("codigoconv",$('#codigoconv').val());
            $.ajax({
                type: "POST",
                url:"php/updateDateEndProp.php",
                enctype:'multipart/form-data',
                data: datoUF,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeUpdateFechaProp").html(data);
                    $("#mensajeUpdateFechaProp").show();
                }
            });
        }
    });
    
    $("#formularioCrearGrupo").validate({
        rules:{
            nrogrupo:{
                required:true,
                number:true,
                maxlength:3,
                lettersNumbersonly:true
            }
        },
        messages:{
          nrogrupo:{
              required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese el numero de grupo</p>',
              number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese un numero entero</p>',
              maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">numero de digitos excedido</p>'
          }
        },
        submitHandler:function(form){
            var datoNG=new FormData();
            datoNG.append("nrogrupo",$('#nrogrupo').val());
            $.ajax({
                type: "POST",
                url:"php/subirGrupo.php",
                enctype:'multipart/form-data',
                data: datoNG,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#tablagruposLibres").html(data);
                    $("#tablagruposLibres").show();
                    document.location.reload(true);
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
    $("#formularioNumeroRevisiones").validate({
       rules:{
           cantidad:{
               required:true,
               number:true
           }
       },
       messages:{
           cantidad:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese el numero de revisiones</p>',
               number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese un numero entero</p>'
           }
       },
       submitHandler:function(form){
           var datoNR=new FormData();
           datoNR.append("cantidad",$('#cantidad').val());
           $.ajax({
               type: "POST",
               url:"php/guardarConfNumRev.php",
               enctype:'multipart/form-data',
               data: datoNR,
               cache: false,
               contentType: false,
               processData: false,
               mimeType: 'multipart/form-data',
               success: function(data){
                   $("#mensajeNumeroRevisiones").html(data);
                   $("#mensajeNumeroRevisiones").show();
               }
           });
       }
    });

    $("#formularioChat").validate({
        rules:{
            mensaje:{
                required:true,
                maxlength:500
            }
        },
        submitHandler:function(form){
            var datosChat =new FormData();
            datosChat.append("mensaje",$( '#mensaje').val());
            datosChat.append("codUsuario",$("#codUsuario").val());
            $.ajax({
                type: "POST",
                url:"php/enviarMensaje.php",
                enctype:'multipart/form-data',
                data: datosChat,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#chat").html(data);
                    $("#chat").show();
                    $("#mensaje").val('');
                    $("#chat").scrollTop($("#chat").height()*100);
                }
            });
        },
        messages:{
            mensaje:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">escriba un mensaje a enviar</p>'
            },
            maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">son 500 carateres como maximo</p>'
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
        },
        success: function(element) {
            element
                .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
        }
    });
    $("#formularioRegistroGE").validate({
        rules:{
            nombreGE:{
                required:true,
                minlength:3,
                maxlength:30,
                lettersNumbersonly:true
            }
        },
        submitHandler:function(form){
            var datos =new FormData();
            datos.append("logo",$( '#logo' )[0].files[0]);
            datos.append("nombreGE",$("#nombreGE").val());
            $.ajax({
                type: "POST",
                url:"php/validarNombreGE.php",
                enctype:'multipart/form-data',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeRegistroGrupoEmpresa").html(data);
                    $("#mensajeRegistroGrupoEmpresa").show();
                    //$("#formid").hide();
                }
            });
        },
        messages:{
            nombreGE:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese nombre para la empresa</p>',
                minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 3 caracteres</p>',
                maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 30 caracteres</p>'
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
        },
        success: function(element) {
            element
                .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
        }
    });

    $("#formularioRegistroHorario").validate({
        rules:{
            grupoDoc:{
                required:true
            },
            dia:{
                required:true
            },
            horario:{
                required:true
            }
        },
        messages:{
            grupoDoc:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">selecione su grupo</p>'
            },
            dia:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">selecione dia</p>'
            },
            horario:{
                required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">selecione horario</p>'
            }
        },
        submitHandler:function(form){
            var datos = 'grupoDoc='+$('#elegirgrupo').val()+'&dia='+$('#elegirdia').val()+'&horario='+$('#elegirhorario').val();
            $.ajax({
                type: "POST",
                url:"php/validarHorarioGE.php",
                data: datos,
                success: function(data){
                    $("#mensajeFormularioHorario").html(data);
                    $("#mensajeFormularioHorario").show();
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
    $("#formularioRegistroIntegrantes").validate({
       rules:{
           nombres:{
               required:true,
               minlength:3,
               maxlength:25,
               lettersonly:true
           },
           carnets:{
               required:true,
               number:true,
               minlength:5,
               maxlength:10
           },
           telefonos:{
               number:true,
               minlength:5,
               maxlength:10
           },
           emails:{
               email:true,
               maxlength:25
           }
       },
       messages:{
           nombres:{
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese su nombre</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 3 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 25 caracteres</p>'
           },
           carnets:{
               number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese un numero</p>',
               required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese su numero de carnet</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 5 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 10 caracteres</p>'
           },
           telefonos:{
               number:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">ingrese un numero</p>',
               minlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">minimo 5 caracteres</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 10 caracteres</p>'
           },
           emails:{
               email:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">email invalido</p>',
               maxlength:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">maximo 25 caracteres</p>'
           }
       },
        submitHandler:function(form){
            var datos =new FormData();
            datos.append("nombres",$("#nombres").val());
            datos.append("carnets",$("#carnets").val());
            datos.append("telefonos",$("#telefonos").val());
            datos.append("emails",$("#emails").val());
            datos.append("fotos",$( '#fotos' )[0].files[0]);
            datos.append("nombreGE",$("#nombreGE").val());
            $.ajax({
                type: "POST",
                url:"php/validarIntegrantesGE.php",
                enctype:'multipart/form-data',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: 'multipart/form-data',
                success: function(data){
                    $("#mensajeFormularioRegistroIntegrante").html(data);
                    $("#mensajeFormularioRegistroIntegrante").show();
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

    $("#formularioRegistroRep").validate({
       rules:{
           nombreuser: {
               required:true,
               lettersonly:true,
               minlength:3,
               maxlength:25
           },
           grupo:{
               required:true
           },
           nombres:{
               required:true,
               lettersonly:true,
               minlength:3,
               maxlength:25
           },
           apellidos:{
               required:true,
               lettersonly:true,
               minlength:3,
               maxlength:25
           },
           password:{
               required:true,
               lettersNumbersonly:true,
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
                 bootbox.alert(data, function() {

                 });
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
            maxlength:40,
            lettersNumbersonly:true
         },
         archivo:{
            required:true
         }
      },
      messages: {
         nombredoc :{
            required:'<p class="err" style="color: rgba(170, 0, 0, 0.76)">Ingrese un nombre</p>',
            minlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como minimo 3 caracteres</p>',
            maxlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como maximo de 40 caracteres</p>'
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
                    bootbox.alert(data, function() {

                    });
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
            maxlength:40,
            lettersNumbersonly:true
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
            maxlength:'<p style="color: rgba(170, 0, 0, 0.76)">tener como maximo de 40 caracteres</p>'
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
                 bootbox.alert(data, function(){

                 });
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
            maxlength : 15,  //para validar campo con maximo 9 caracteres
            lettersonly:true
         },
         nombres :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 20,  //para validar campo con maximo 9 caracteres
            lettersonly:true
         },
         apellidos :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 20,  //para validar campo con maximo 9 caracteres
            lettersonly:true
         },
         nrogrupo :{
            required : true
         },
         password :{
            required : true,
            minlength : 3, //para validar campo con minimo 3 caracteres
            maxlength : 16,  //para validar campo con maximo 9 caracteres
            lettersNumbersonly:true
         },
         emailDoc :{
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
            required : "<p style='color: #b80000'>seleccione un grupo</p>" //para validar campo vacio
         },
         password :{
            required : "<p style='color: #b80000'>debe ingresar su contrasena</p>", //para validar campo vacio
            minlength : "<p style='color: #b80000'>El nombre debe tener un minimo de 3 caracteres</p>",
            maxlength : "EL nombre debe tener un maximo de 16 caracteres</p>"
         },
         emailDoc :{
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
