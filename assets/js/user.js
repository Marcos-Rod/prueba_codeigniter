
$(document).ready(function () {

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    
    
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
                        console.log(data[0]);
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
});
