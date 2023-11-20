
$(document).ready(function () {

    $(document).ready(function () {
        $('#myTable').DataTable();
    });


    $('#codigo_postal').on('change', function () {
        var codigoPostal = $(this).val();
        if (codigoPostal.length === 5) {
            $.ajax({
                url: 'https://api.copomex.com/query/info_cp/' + codigoPostal + '?token=pruebas',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    if (data.error) {
                        console.log('Error en la consulta a la API de SEPOMEX');
                    } else {
                        $('#colonia').val(data[0].response.asentamiento);
                        $('#delegacion').val(data[0].response.municipio);
                        $('#estado').val(data[0].response.estado);
                    }
                },
                error: function () {
                    console.log('Error en la solicitud a la API de SEPOMEX');
                }
            });
        }
    });

    // Validación de campos de formulario
    $('#form-register').validate({
        rules: {
            name: {
                required: true,
            },
            lastname: {
                required: true,
            },
            gender: {
                required: true,
            },
            phone: {
                required: true,
                phoneUS: true
            },
            email: {
                required: true,
                email: true
            },
            codigo_postal: {
                required: true,
                maxlength: 5,
                minlength: 5
            },
            colonia: {
                required: true,
            },
            delegacion: {
                required: true,
            },
            municipio: {
                required: true,
            },
            estado: {
                required: true,
            },
            user_type: {
                required: true,
            },
            password: {
                required: false,
                minlength: 8
            }
        },
        messages: {
            name: {
                required: "Debes escribir el nombre del usuario",
                minlength: "Escribe tu nombre completo",
            },
            lastname: {
                required: "Debes escribir el apellido del usuario",
                minlength: "Escribe tu nombre completo",
            },
            gender: {
                required: "Debes seleccionar un género",
            },
            phone: {
                required: "Debes escribir el teléfono de contacto",
                phoneUS: "Escriba un número de teléfono válido"
            },
            email: {
                required: "Debes escribir el correo",
                email: "Escriba un correo v&aacute;lido"
            },
            codigo_postal: {
                required: "Debes escribir un código postal",
                maxlength: "El código postal debe ser de 5 dígitos",
                minlength: "El código postal debe ser de 5 dígitos"
            },
            colonia: {
                required: "Debes escribir la colonia",
            },
            delegacion: {
                required: "Debes escribir la delegacion o municipio",
            },
            estado: {
                required: "Debes escribir el Estado",
            },
            user_type: {
                required: "Debes asignar un tipo de usuario",
            },
            password: {
                minlength: "Escriba una contraseña de al menos 8 carácteres"
            }
        }
    });
});
