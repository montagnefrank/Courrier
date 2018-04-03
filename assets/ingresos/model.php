<script type='text/javascript'>
    $(document).on('click', '.savenew_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if ($('#numerocedula_input').val() != '' &&
                    $('#cantidadBoletos').val() != '') {
                var formData = new FormData();
                formData.append('addnewreg', 'true');
                formData.append('cedula', $("#numerocedula_input").val());
                formData.append('boletos', $("#cantidadBoletos").val());
                $.ajax({
                    url: 'assets/ingresos/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        $('#datetimepicker1,#placavehiculo_input,#numerocedula_input,#nombre_input,#phone_input,#email_input,#asientos_select').val('');
                        $('#listadoasientos').html('');
                        $('#message-box-success').toggle();
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

    $("#numerocedula_input").keypress(function (e) {
        if ($("#numerocedula_input").val().length < 10) {
            return e.charCode >= 48 && e.charCode <= 57
        }
        return false;
    });
</script>