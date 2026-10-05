$(document).ready(function () {

    if ($('#formLogin').length === 0) {
        return;
    }

    $('#formLogin').on('submit', function (e) {
        e.preventDefault();

        var formulario = $('#formLogin');
        var datos = new FormData(formulario[0]);

        $.ajax({
            url: 'http://localhost/tp2pro/public/autenticacion/ingresar',
            type: 'POST',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.ok) {
                    window.location.href = 'http://localhost/tp2pro/public/examenes';
                } else {
                    $('#mensaje').text(response.mensaje);
                }
            },
            error: function (error) {
                console.log('Error en la solicitud');
            }
        });
    });
});
