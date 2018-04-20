<script type='text/javascript'>

    $(document).on('click', '#leercedula_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        if ($('#cedula_input').val() != '') {
            var formData = new FormData();
            formData.append('leertracking', 'true');
            formData.append('valortrack', $('#cedula_input').val());
            $.ajax({
                url: 'assets/track/control.php',
                type: 'POST',
                data: formData,
                dataType: "json",
                success: function (dataingreso) {
                    if (dataingreso == "error") {
                        pageLoadingFrame("hide");
                        $('.errormessage_mb').html('No se encontr&oacute; ning&uacute;n tracking en tr&aacute;nsito en el sistema');
                        $('#cedula_input').val('');
                        $('#message-box-danger').toggle();
                    } else {
                        setTimeout(function () {
                            var formData = new FormData();
                            formData.append('token', '55805a3e3043d7e74be0009af9061d55');
                            formData.append('telefono', dataingreso.num);
                            formData.append('mensaje', dataingreso.msg);
                            formData.append('action', 'recibir');
                            formData.append('campoextra', dataingreso.placa);
                            $.ajax({
                                url: 'http://sms.commerce-place.com:94/phpserial/',
                                type: 'POST',
                                data: formData,
                                dataType: "json",
                                success: function (data) {
                                    if (data.error) {
                                        pageLoadingFrame("hide");
                                        $('.errormessage_mb').html(data.error);
                                        $('#message-box-danger').toggle();
                                        console.log(data);
                                        return;
                                    }
                                    if (data.success) {
                                        var mcc = data.respuesta.split("mcc=");
                                        if (mcc.length <= 1) {
                                            pageLoadingFrame("hide");
                                            $('.errormessage_mb').html('El mensaje recibido no es un mensaje de tracking');
                                            $('#message-box-danger').toggle();
                                            console.log(data);
                                            return;
                                        }
                                        mcc = mcc[1].split("&amp;mnc=");
                                        var mnc = data.respuesta.split("mnc=");
                                        mnc = mnc[1].split("&amp;lac=");
                                        var lac = data.respuesta.split("lac=");
                                        lac = lac[1].split("&amp;cellid=");
                                        var cellid = data.respuesta.split("cellid=");
                                        if (mcc[0] == 0 || lac[0] == 0 || cellid[1] == 0) {
                                            pageLoadingFrame("hide");
                                            $('.errormessage_mb').html('No pudimos ubicar el dispositivo, intente de nuevo mas tarde');
                                            $('#message-box-danger').toggle();
                                            console.log(data);
                                            return;
                                        }
                                        var settings = {
                                            "async": true,
                                            "crossDomain": true,
                                            "url": "https://us1.unwiredlabs.com/v2/process.php",
                                            "method": "POST",
                                            "headers": {},
                                            "processData": false,
                                            "data": "{\"token\": \"9b5cd3b032b05e\",\"radio\": \"gsm\",\"mcc\": " + mcc[0] + ",\"mnc\": " + mnc[0] + ",\"cells\": [{\"lac\": " + lac[0] + ",\"cid\": " + cellid[1] + "}],\"address\": 1}"
                                        }
                                        console.log(settings);
                                        $.ajax(settings).done(function (response) {
                                            $.when(
                                                    $(".searchboxrastrear").slideUp("slow"),
                                                    pageLoadingFrame("hide")
                                                    ).then(function () {
                                                $('.nombreemisor_cont').html(dataingreso.fila.nombreIngreso);
                                                $('.cedulaemisor_cont').html(dataingreso.fila.cedulaIngreso);
                                                $('.nombrereceptor_cont').html(dataingreso.fila.renombre);
                                                $('.cedulareceptor_cont').html(dataingreso.fila.reCedula);
                                                $('.origen_cont').html(dataingreso.fila.origenIngreso);
                                                $('.destino_cont').html(dataingreso.fila.destinoIngreso);
                                                $('.fecha_cont').html(dataingreso.fila.horaIngreso);
                                                newLocation(response.lat, response.lon);
                                                addMarker(response.lat,response.lon)
                                                $(".detalles_panel").slideDown("slow");
                                                console.log(dataingreso);
                                                console.log(response);
                                            });
                                        });
                                    }
                                },
                                error: function (error) {
                                    pageLoadingFrame("hide");
                                    $('.errormessage_mb').html('Error de red, revise su conexi&oacute;n');
                                    $('#message-box-danger').toggle();
                                    console.log(error);
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        }, 1000);
                    }
                },
                error: function (error) {
                    pageLoadingFrame("hide");
                    $(".customalert_text").html('Error de red, revise su conexi&oacute;nn');
                    $(".customalert").animate({width: 'toggle'}, 600);
                    console.log(error);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            setTimeout(function () {
                pageLoadingFrame("hide");
                $(".customalert_text").html('Debes ingresar un tracking para continuar');
                $(".customalert").animate({width: 'toggle'}, 600);
            }, 1000);
        }
    });

    $(document).on("click", function () {
        $(".notificactionbox,.customalert").animate({width: 'hide'}, 600);
        $('#message-box-success,#message-box-danger').hide();
    });

    $("#cedula_input").keypress(function (e) {
        if (e.charCode == 13) {
            $("#leercedula_btn").click();
        }
    });

    ///////////////////////////////API GOOGLE MAPS
    var mapOptions = {
        zoom: 12,
        scrollwheel: false,
        center: new google.maps.LatLng(-0.238978, -78.5231),
        styles: [{"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "simplified"}, {"hue": "#00afff"}, {"saturation": "100"}, {"lightness": "0"}, {"weight": "4.03"}, {"gamma": "0.50"}]},
            {"featureType": "poi.business", "elementType": "all", "stylers": [{"visibility": "on"}, {"hue": "#00afff"}, {"weight": "0.50"}]},
            {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "on"}, {"hue": "#00afff"}, {"saturation": "67"}, {"lightness": "57"}]}]};
    var mapElement_VF = document.getElementById('googlemap');
    var map_VF = new google.maps.Map(mapElement_VF, mapOptions);

////////////////////////////////////////////////////////////CAMBIAR EL CENTRO DEL GOOGLE MAPS CUANDO CAMBIO A PANTALLA COMPLETA
    function newLocation(newLat, newLng)
    {
        map_VF.panTo({
            lat: newLat,
            lng: newLng
        });
        map_VF.setZoom(12);
    }

    //////////////////////////////AGREGAMOS UN NUEVO MARCADOR AL MAPA
    function addMarker(lat,lon) {
        var location = new google.maps.LatLng(lat, lon);
        marker = new google.maps.Marker({
            position: location,
            map: map_VF
        });
    }
</script>