$(function() {
    $("#fechai").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1,
        onClose: function(selectedDate) {
            saleFoco($("#fechai"));
            $("#fechaf").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#fechaf").datepicker({
        defaultDate: "+1w",
        numberOfMonths: 1,
        onClose: function(selectedDate) {
            saleFoco($("#fechaf"));
            $("#fechai").datepicker("option", "maxDate", selectedDate);
        }
    });
});
function validar() {
    validado = true;
    $('input[type=text]').each(function(index) {
        if ($(this).next('span').html() != 'Ok') {
            set_mensaje(this, 'Comprueba este campo', 'error');
            validado = false;
        }
    });
    return validado;
}
function entraFoco(text) {
    set_mensaje(text, $(text).attr('title'), '');
}
function saleFoco(text) {
    if ($(text).val().length == 0) {
        set_mensaje(text, 'Seleccione una fecha', 'error');
    }
    else {
        set_mensaje(text, 'Ok', 'correcto');
    }
}
function set_mensaje(texto, mensaje, clase) {
    $(texto).next('span').attr('class', clase);
    $(texto).next('span').html(mensaje);
}


