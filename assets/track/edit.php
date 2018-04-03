<script>
    ////////////////////////////////////////////
    //********** API SMS BITECORP ************//
    ////////////////////////////////////////////

    //** Declaramos la variable de comportamiento de la API **//
    var smsdata = {
        token: 'valor', //** Reemplazar con Token de Seguridad || En caso de no poseer Token, solicitar http://bitecorp.com **//
        telefono: 'valor', //** Reemplazar con Telefono destinatario **//
        mensaje: 'valor', //** Reemplazar con Mensaje a enviar **//
        action: 'valor', //** Seleccione 'enviar' o 'recibir' **//
        campoextra: 'valor', //** Retorna el mismo valor en el callback para identificar el request **//
    }, url = 'http://sms.commerce-place.com:94/17AEAA5/';

    $.post(url, smsdata, function (response) {
        console.log(response);
    });
</script>