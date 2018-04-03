<script type='text/javascript'>

    //////////////////////////////////////VARIABLES GLOBALEs
    var cargamax;
    ////////////////////////////////////////////////////////////////////////////AL HACER CLIC EN GUARDAR NUEVO INGRESO
    $(document).on('click', '.savenew_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if (
                    $('#datetimepicker1,#numerocedula_input,#nombre_input,#phone_input,#email_input,#recedula_input,#renombre_input,#rephone_input,#reemail_input').val() != '' &&
                    $('#origen_select,#destino_select,#placavehiculo_input,#peso_input').val() != null &&
                    $('#discoselect,#origen_select,#destino_select').val() != '0'
                    ) {
                if (isEmail($('#email_input').val()) &&
                        isEmail($('#reemail_input').val())) {
                    if ($.isNumeric($("#disponibilidad").val()) || $("#documentos_checkbox").prop('checked') == true) {
                        var formData = new FormData();
                        formData.append('addnewreg', 'true');
                        formData.append('origen', $('#origen_select option:selected').text());
                        formData.append('destino', $('#destino_select option:selected').text());
                        formData.append('placa', $('#placavehiculo_input').val());
                        if ($("#documentos_checkbox").prop('checked') == true) {
                            formData.append('peso', "documentos");
                        } else {
                            formData.append('peso', $('#peso_input').val());
                        }
                        if ($("#domicilio_checkbox").prop('checked') == true) {
                            formData.append('domaddr', $('#domicilio_input').val());
                            formData.append('isdom', '1');
                        } else {
                            formData.append('domaddr', 'OFF');
                            formData.append('isdom', '0');
                        }
                        formData.append('precio', $('#precio_input').val());
                        formData.append('observaciones', $('#observ').val());
                        formData.append('horario', $("#datetimepicker1").val());
                        formData.append('cedula', $("#numerocedula_input").val());
                        formData.append('nombre', $("#nombre_input").val());
                        formData.append('telefono', $("#phone_input").val());
                        formData.append('email', $("#email_input").val());
                        formData.append('recedula', $("#recedula_input").val());
                        formData.append('renombre', $("#renombre_input").val());
                        formData.append('retelefono', $("#rephone_input").val());
                        formData.append('reemail', $("#reemail_input").val());
                        if ($("#enviaremail_input").prop('checked') == true) {
                            formData.append('reportIngreso', '1');
                        } else {
                            formData.append('reportIngreso', '0');
                        }
                        $.ajax({
                            url: 'assets/boletos/control.php',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                pageLoadingFrame("hide");
                                $('.succesmessage_mb').html("Se registró correctamente el envío  y se notific&oacute; a los involucrados");
                                $('#datetimepicker1, input[type="text"] ,textarea , select').val('');
                                $('#message-box-success').toggle();
                                if ($("#tagprint_input").prop('checked') == true) {
                                    tagToScreen(data);
                                }
                            },
                            error: function (error) {
                                pageLoadingFrame("hide");
                                $('.errormessage_mb').html('Error de red, revise su conexi&oacute;n');
                                $('#message-box-danger').toggle();
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    } 
                    else {
                        pageLoadingFrame("hide");
                        $('.errormessage_mb').html('No puedes exceder la carga maxima del disco');
                        $('#message-box-danger').toggle();
                    }
                } else {
                    pageLoadingFrame("hide");
                    $('.errormessage_mb').html('Debes ingresar una direccion de email valida');
                    $('#message-box-danger').toggle();
                }
            } else {
                pageLoadingFrame("hide");
                $('.errormessage_mb').html('Debe ingresar la informaci&oacute;n en todos los campos');
                $('#message-box-danger').toggle();
            }
        }, 500);
    });

    $(document).on('click', function (e) {
        $('#message-box-success,#message-box-danger').hide();
    });

/////////////////////////DEBUG ACTION
    $(document).on('click', '#showmodal', function (e) {
        if ($("#tagprint_input").prop('checked') == true) {
            tagToScreen();
        }
    });
    

    $('#asientos_select').on('change', function () {
        $('#listadoasientos').html('');
        $.each($('#asientos_select').val(), function (key, value) {
            $('#listadoasientos').append("<div class='col-md-12 pull-left asientoseleccionado'> <div class='col-md-2'><label>Asiento <span class='numerodelasiento'>" + value + "</span> </label> </div><div class='col-md-4 push-down-10'><select class='form-control select precioespecial_select' data-style='btn-success'><option value='" + $("#destinoruta_select").val() + "'>Regular</option><option value='" + $("#destinoruta_select").val() / 2 + "'>Tercera Edad</option><option value='" + $("#destinoruta_select").val() / 2 + "'>Discapacitado</option></select></div><div class='col-md-2'><label >Precio: <span class='preciodelboleto'>" + $("#destinoruta_select").val() + "</span> $ </label></div>");
        });
    });

    $('#discoselect').on('change', function () {
        if ($(this).val() != '0') {
            $("#placavehiculo_input").val($(this).val());
            cargamax = $("#cargamaxinput_" + $(this).val()).val();
            $("#disponibilidad").val(cargamax);
            console.log(cargamax);
            console.log($(this).val());
        } else {
            $("#placavehiculo_input").val('');
        }
    });

    ////////////////////////////////////////////////////////////////////////////VALIDAR SI ENVIA DOCUMENTOS O CARGA PESADA
    $('#documentos_checkbox').on('ifChecked', function () {  ////////////AL TILDAR
        $("#peso_input").attr("disabled", "disabled");
        $("#peso_input").val("");
        $("#disponibilidad").val("");
    });
    $('#documentos_checkbox').on('ifUnchecked', function () {  ///////////AL DESTILDAR
        $("#peso_input").prop("disabled", false);
    });

    $(document).on('change', '.precioespecial_select, #documentos_checkbox', function (e) {
        var self, precio;
        self = this;
        precio = $(self).val();
        $(self).parent().parent().find(".preciodelboleto").html(precio);
    });

    $("#peso_input").keypress(function (e) {
        if ($("#peso_input").val().length < 4) {
            if ($("#disponibilidad").val() != '') {
                return e.charCode >= 48 && e.charCode <= 57;
            }
        }
        return false;
    });
    $("#peso_input").keyup(function (e) {
        if ($("#disponibilidad").val() != '') {
            var calculado = cargamax - $("#peso_input").val();
            if (calculado > 0) {
                $("#disponibilidad").val(calculado);
            } else {
                $("#disponibilidad").val("Carga excedida");
            }

        }
    });

    $("#numerocedula_input,#phone_input,#recedula_input,#rephone_input").keypress(function (e) {
        if ($(this).val().length < 10) {
            return e.charCode >= 48 && e.charCode <= 57;
        }
        return false;
    });

    $('#domicilio_checkbox').on('ifChecked', function () {  ////////////AL TILDAR
        $("#domicilio_input").prop("disabled", false);
        $("#domicilio_input").val("");
    });
    $('#domicilio_checkbox').on('ifUnchecked', function () {  ///////////AL DESTILDAR
        $("#domicilio_input").attr("disabled", "disabled");
        $("#domicilio_input").val("");
    });

    function tagToScreen(tagID) {
        window.open('print/index.php?tag=' + tagID, '_blank', 'location=yes,height=700,width=520,scrollbars=yes,status=yes');
    }
    
    $(document).on('click', '.verasientosbtn', function (e) {
        window.open('assets/boletos/seats/test/index.html', '_blank', 'location=yes,height=700,width=520,scrollbars=yes,status=yes');
    });
</script>