/* $("#imagen").live("click",function (){
    var elemento=$(this);
    if($(elemento).attr("type")!=="file"){
        var seleccionado=$(getElementoSeleccionado());
    var elemento=$(this);
    if(seleccionado!==undefined){
        var x=$("#contenido #imagen").index(seleccionado);
        var pos=$("#contenido #imagen").index(this);
        if(x!==pos){
            $(seleccionado).css("border-color", "#000000");
            $(seleccionado).removeClass("seleccionado");
        }
    }
    var clase=$(elemento).attr("class");
    if(clase===undefined || clase===null || clase===""){
        $(elemento).css("border-color","#66ff66");   
        $(elemento).addClass("seleccionado");
    }
    else{
         $(elemento).css("border-color","#000000");   
         $(elemento).removeClass("seleccionado");
    }
    }
 });*/
 function enviar(){
     //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = "";    
        //hacemos la petición ajax  
        $.ajax({
            url: 'Herramientas/procesarImagen.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)         
            },
            dataType: 'Json',
            //una vez finalizado correctamente
            success: function(data){
                var datos=data;
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                showMessage(message);
                var elemento=$(getElementoSeleccionado());
                alert(datos[1]);
                
                if($(elemento).has("img").length===0){
                    $(elemento).append("<center><img src='Imagenes/"+data[0]+"' /><br>\n\
                    <label>"+datos[1]+"</label></center>");
                }
                else{
                    $(elemento).empty();
                    $(elemento).append("<center><img src='Imagenes/"+data[0]+"' /><br>\n\
                    <label>"+datos[1]+"</label></center>");
                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<center><span class='error'>Ha ocurrido un error.</span></center>");
                showMessage(message);
            }
        });
 }
 //como la utilizamos demasiadas veces, creamos una función para
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
