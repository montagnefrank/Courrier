<script type='text/javascript'>

    $(document).on('click', '#leercedula_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        if ($('#cedula_input').val() != '') {
            var formData = new FormData();
            formData.append('leercedula', 'true');
            formData.append('valorcedula', $('#cedula_input').val());
            $.ajax({
                url: 'assets/checkout/control.php',
                type: 'POST',
                data: formData,
                dataType: "json",
                success: function (data) {
                    if (data == "error") {
                        pageLoadingFrame("hide");
                        $('.errormessage_mb').html('No existen envíos disponibles para la cédula ingresada');
                        $('#cedula_input').val('');
                        $('#message-box-danger').toggle();
                    } else {
                        $(".listado_callback").html('');
                        $(data).each(function (index, value) {
                            $(".listado_callback").append(value.view);
                        });
                        pageLoadingFrame("hide");
                        $.when(
                                $(".searchboxpedidos").slideUp("slow")
                                ).then(function () {
                            $(".listadoregistros").slideDown("slow");
                        });
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
                $(".customalert_text").html('Debes ingresar una cedula de indentidad');
                $(".customalert").animate({width: 'toggle'}, 600);
            }, 1000);
        }
    });

    $(document).on("click", function () {
        $(".notificactionbox,.customalert").animate({width: 'hide'}, 600);
        $('#message-box-success,#message-box-danger').hide();
    });

    $(document).on('click', '.buscarnuevobtn', function (e) {
        e.preventDefault();
        $.when($(".listadoregistros,.registardespachopanel").slideUp("slow")
                ).then(function () {
            $(".searchboxpedidos").slideDown("slow");
        });
    });

    $(document).on('click', '.mismousuario', function (e) {
        e.preventDefault();
        $('.despachonombre_input').val($(".recibenombre_input").val());
        $('.despachocedula_input').val($(".recibecedula_input").val());
        $('.despachotelefono_input').val($(".recibetelefono_input").val());
        $('.despachoemail_input').val($(".recibeemail_input").val());
    });

    $(document).on('click', '.despacharpedidos_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if ($('.despachonombre_input,.despachocedula_input,.despachotelefono_input,.despachoemail_input,.despachartrackings_input').val() != '') {
                if (isEmail($('.despachoemail_input').val())) {
                    var formData = new FormData();
                    formData.append('addnewcheckout', 'true');
                    formData.append('nombreCheckout', $('.despachonombre_input').val());
                    formData.append('cedulaCheckout', $('.despachocedula_input').val());
                    formData.append('telefonoCheckout', $('.despachotelefono_input').val());
                    formData.append('emailCheckout', $('.despachoemail_input').val());
                    formData.append('comentarioCheckout', $('.despachocoment_input').val());
                    formData.append('trackingCheckout', $('.despachartrackings_input').val());
                    $.ajax({
                        url: 'assets/checkout/control.php',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            pageLoadingFrame("hide");
                            $('.succesmessage_mb').html(data);
                            $('#datetimepicker1, input[type="text"] ,textarea , select').val('');
                            $('#message-box-success').toggle();
                            $.when($(".listadoregistros,.registardespachopanel").slideUp("slow")
                                    ).then(function () {
                                $(".searchboxpedidos").slideDown("slow");
                            });
                        },
                        error: function (error) {
                            pageLoadingFrame("hide");
                            $('.errormessage_mb').html('Error de red, revise su conexi&oacute;n');
                            $('#message-box-danger').toggle();
                            $.when($(".listadoregistros,.registardespachopanel").slideUp("slow")
                                    ).then(function () {
                                $(".searchboxpedidos").slideDown("slow");
                            });
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                } else {
                    pageLoadingFrame("hide");
                    $('.errormessage_mb').html('Debes ingresar una direccion de email valida');
                    $('#message-box-danger').toggle();
                }
            } else {
                pageLoadingFrame("hide");
                $('.errormessage_mb').html('Debes rellenar todos los campos para continuar');
                $('#message-box-danger').toggle();
            }
        }, 1000);
    });

    $(document).on('click', '.despacharpedidos', function () {
        var tracklist = new Array();
        $('.despachartrackings_container').html('');
        $('.sigle_pedido').each(function (index, value) {
            if ($(value).find(".switch input").prop('checked') == true) {
                tracklist.push($(value).find(".trackingnumber_container").html());
                $('.recibenombre_input').val($(value).find(".nombrerecibe_container").html());
                $('.recibecedula_input').val($(value).find(".cedularecibe_container").html());
                $('.recibetelefono_input').val($(value).find(".telefonorecibecontainer").html());
                $('.recibeemail_input').val($(value).find(".emailrecibecontainer").html());
                $('.despachartrackings_container').append('<span class="label label-primary fontx120 push-left20">' + $(value).find(".trackingnumber_container").html() + '</span>');
                $('.despachonombre_input,.despachocedula_input,.despachotelefono_input,.despachoemail_input').val('');
            }
        });
        if (tracklist.length > 0) {
            $.when(
                    $(".listadoregistros,.searchboxpedidos").slideUp("slow")
                    ).then(function () {
                $('.despachartrackings_input').val(JSON.stringify(tracklist));
                $(".registardespachopanel").slideDown("slow");
            });
        } else {
            pageLoadingFrame('show');
            setTimeout(function () {
                pageLoadingFrame("hide");
                $('.errormessage_mb').html('Debes seleccionar al menos 1 pedido para despachar');
                $('#cedula_input').val('');
                $('#message-box-danger').toggle();
            }, 1000);
        }
    });

    $("#cedula_input").keypress(function (e) {
        if (e.charCode == 13) {
            $("#leercedula_btn").click();
        }
    });
</script>