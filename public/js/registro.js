$(document).ready(function () {

    if ($('#formRegistro').length === 0) {
        return;
    }

    $('#formRegistro').on('submit', function (e) {
        e.preventDefault();

        var formulario = $('#formRegistro');
        var datos = new FormData(formulario[0]);

        $.ajax({
            url: 'http://localhost/tp2pro/public/autenticacion/registrar',
            type: 'POST',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.ok) {
                    $('#mensaje').removeClass('text-danger').addClass('text-success').text(response.mensaje);
                    $('#formRegistro')[0].reset();
                    setTimeout(function () {
                        window.location.href = 'http://localhost/tp2pro/public/login';
                    }, 1000);
                } else {
                    $('#mensaje').removeClass('text-success').addClass('text-danger').text(response.mensaje);
                }
            },
            error: function (error) {
                console.log('Error en la solicitud');
            }
        });
    });
});