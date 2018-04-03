<script type='text/javascript'>
    /* **************************************************
     script para guardar la informacion del formulario de insercion de disco/
     *******************************/

    $(document).on('click', '.savedisco_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if ($('#disco_input').val() != '' && $('#placa_input').val() != '' &&
                    $('#carga_input').val() != '' && $('#nombreconduc_input').val() != '' &&
                    $('#apellidoconduc_input').val() != '' && $('#idconduc_input').val() != '' &&
                    $('#modelo_input').val() != '' && $('#phone_input').val() != '' && $('#gpsphone_input').val() != ''
                    ) {
                var formData = new FormData();
                formData.append('addnewdisco', 'true');
                formData.append('disco', $('#disco_input').val());
                formData.append('placa', $('#placa_input').val());
                formData.append('carga', $('#carga_input').val());
                formData.append('modelo', $('#modelo_input').val());
                formData.append('nombreconduc', $('#nombreconduc_input').val());
                formData.append('apellidoconduc', $('#apellidoconduc_input').val());
                formData.append('idconduc', $('#idconduc_input').val());
                formData.append('phone_input', $('#phone_input').val());
                formData.append('gpsphone_input', $('#gpsphone_input').val());
                formData.append('dispositivo', $('#devicetype_input').val());
                $.ajax({
                    url: 'assets/discos/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        $('#message-box-success').toggle();
                        getDiscos();
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

    /***************************************************
     script para tomar la informacion del formulario para editar el Disco
     *******************************/

    $(document).on('click', '.edit_disco_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if (
                    $('#disco_edit,#placa_edit,#carga_edit,#nombre_edit,#apellido_edit,#id_edit,#modelo_edit,#modelo_edit,#phone_edit,#gpsphone_edit,#idcontanier_edit,#devicetype_edit').val() != ''
                    )
            {
                var formData = new FormData();
                formData.append('addedit', 'true');
                formData.append('disco_edit', $('#disco_edit').val());
                formData.append('placa_edit', $('#placa_edit').val());
                formData.append('carga_edit', $('#carga_edit').val());
                formData.append('modelo_edit', $('#modelo_edit').val());
                formData.append('nombre_edit', $('#nombre_edit').val());
                formData.append('apellido_edit', $('#apellido_edit').val());
                formData.append('id_edit', $('#id_edit').val());
                formData.append('phone', $('#phone_edit').val());
                formData.append('gpsphone', $('#gpsphone_edit').val());
                formData.append('dispositivo', $('#devicetype_edit').val());
                formData.append('editId', $('#idcontanier_edit').val());
                $.ajax({
                    url: 'assets/discos/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        $('#message-box-success').toggle();
                        $.when($(".editing_panel").slideUp("slow")).then(function (e) {
                            $(".agregarnuevo_panel,.nuevo_panel").slideDown("slow");
                            getDiscos();
                        });
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

    ////////////////////////CERRAMOS LA VENTNA DE NOTIFICACION CON CLIC EN CUALQUIER PARTE DE LA PAGINA
    $(document).on('click', function (e) {
        $('#message-box-success,#message-box-danger').hide();
    });

    /* **************************************************
     script para mostrar es formulario de edicion de discos /
     *******************************/

    $(document).on('click', '.singleing_row', function (e) {
        e.preventDefault();
        var self = this,
                text = $(self).find(".disco").text(),
                carga = $(self).find(".carga").text(),
                placa = $(self).find(".placa").text(),
                modelo = $(self).find(".modelo").text(),
                nombre = $(self).find(".nombres").text(),
                apellido = $(self).find(".apellidos").text(),
                cedula = $(self).find(".cedula").text(),
                phone = $(self).find(".phone").text(),
                gpsphone = $(self).find(".gpsphone").text(),
                devicetype = $(self).find(".devicetype").text(),
                idtoedit = $(self).find(".idcontainer").text();
        $.when($(".agregarnuevo_panel,.ingredientes_lista,.editing_panel").slideUp("slow")).then(function (e) {
            $("#disco_edit").val(text);
            $('#carga_edit').val(carga);
            $('#placa_edit').val(placa);
            $('#modelo_edit').val(modelo);
            $('#nombre_edit').val(nombre);
            $('#apellido_edit').val(apellido);
            $('#id_edit').val(cedula);
            $('#phone_edit').val(phone);
            $('#gpsphone_edit').val(gpsphone);
            $('#devicetype_edit').val(devicetype);
            $('#idcontanier_edit').val(idtoedit);
            $(".editing_panel").slideDown("slow");
        });
    });

    $(document).on('click', '.goback_ing_btn', function (e) {
        e.preventDefault();
        var self;
        self = this;
        $.when($(".agregarnuevo_panel,.editing_panel").slideUp("slow")).then(function (e) {
            $(".agregarnuevo_panel").slideDown("slow");
            getDiscos();
        });
    });

    $(document).on('click', '.delete_disco', function (e) {
        e.preventDefault();
        var self = this, id = $(self).parent().find(".idcontainer").text(), formData = new FormData();
        pageLoadingFrame('show');
        formData.append('deleteDisco', 'true');
        formData.append('deleteId', id);
        $.ajax({
            url: 'assets/discos/control.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                $('.succesmessage_mb').html(data);
                $('#message-box-success').toggle();
                setTimeout(function () {
                    pageLoadingFrame("hide");
                    $.when($(".editing_panel").slideUp("slow")).then(function (e) {
                        $(".agregarnuevo_panel,.nuevo_panel").slideDown("slow");
                    });
                    getDiscos();
                }, 1000);
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
    });
    
    $(document).ready(function (e) {
        getDiscos();
    });

    function getDiscos(e) {
        var formData = new FormData();
        formData.append('getList', 'true');
        $.ajax({
            url: 'assets/discos/control.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                $('.listadoDiscos').html(data);
            },
            error: function (error) {
                console.log(error);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
</script>