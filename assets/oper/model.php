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
                url: 'assets/oper/control.php',
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
                        pageLoadingFrame("hide"); 
                        $("#origen").html(data.origenIngreso);
                        $("#disco").html(data.placaIngreso);
                        $("#fecha").html(data.horaIngreso);
                        $("#destino").html(data.destinoIngreso);
                        $("#peso").html(data.pesoIngreso);
                        $("#observ").html(data.observaciones);
                        $("#cedula").html(data.cedulaIngreso);
                        $("#nombres").html(data.nombreIngreso);
                        $("#telef").html(data.telefonoIngreso);
                        $("#email").html(data.emailIngreso);
                        $("#recedula").html(data.reCedula);
                        $("#renombre").html(data.renombre);
                        $("#retelef").html(data.reTelef);
                        $("#reemail").html(data.reEmail);
                        $(".results").slideDown("slow");
                        $('#cedula_input').val('');
                        $( "#cedula_input" ).focus();
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
            pageLoadingFrame("hide");
            $(".customalert_text").html('Debes ingresar una cedula de indentidad');
            $(".customalert").animate({width: 'toggle'}, 600);
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
</script>