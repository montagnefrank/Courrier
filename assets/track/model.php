<script>
    ////////////////////////////////////////////
    //********** API SMS BITECORP ************//
    ////////////////////////////////////////////

    //** Declaramos la variable de comportamiento de la API **//
    var smsdata = {
        token: '55805a3e3043d7e74be0009af9061d55', //** Reemplazar con Token de Seguridad || En caso de no poseer Token, solicitar http://bitecorp.com **//
        telefono: '0979012981', //** Reemplazar con Telefono destinatario **//
        mensaje: 'Rescataste bien', //** Reemplazar con Mensaje a enviar **//
        action: 'recibir', //** Seleccione 'enviar' o 'recibir' **//
        campoextra: 'campoextra', //** Retorna el mismo valor en el callback para identificar el request **//
    }
    var url = 'http://sms.commerce-place.com:94/17AEAA5/';

    $.post(url, smsdata, function (response) {
        console.log(response);
    });
</script>