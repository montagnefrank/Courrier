<script type='text/javascript'>
    /* **************************************************
     script para guardar la informacion del formulario de insercion de disco/
     *******************************/

    $(document).on('click', '.saveEst_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if ($('#nombreEst_input').val() != '' && $('#dirEst_input').val() != '' &&
                    $('#ciudadEst_input').val() != '' && $('#telEst_input').val() != '' &&
                    $('#serctorEst_input').val() != '' 
                    ) {
                var formData = new FormData();
                formData.append('addnewsuc', 'true');
                formData.append('nombreEst', $('#nombreEst_input').val());
                formData.append('dirEst', $('#dirEst_input').val());
                formData.append('ciudadEst', $('#ciudadEst_input').val());
                formData.append('phoneEst', $('#telEst_input').val());
                formData.append('sectorEst', $('#serctorEst_input').val());
                $.ajax({
                    url: 'assets/suc/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        $('#message-box-success').toggle();
                        getSucursales();
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

    /***************************************************
     script para tomar la informacion del formulario para editar el Disco
     *******************************/

    $(document).on('click', '.edit_est_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if (
                    $('#nombreEst_edit').val() != '' &&
                    $('#dirEst_edit').val() != '' &&
                    $('#ciudadEst_edit').val() != '' &&
                    $('#phoneEst_edit').val() != '' &&
                    $('#sectorEst_edit').val() != ''  &&
                    $('#idcontanier_edit').val() != '' 
                    )
            {
                var formData = new FormData();
                formData.append('editSuc', 'true');
                formData.append('nombreEst', $('#nombreEst_edit').val());
                formData.append('dirEst', $('#dirEst_edit').val());
                formData.append('ciudadEst', $('#ciudadEst_edit').val());
                formData.append('phoneEst', $('#phoneEst_edit').val());
                formData.append('sectorEst', $('#sectorEst_edit').val());
                formData.append('editId', $('#idcontanier_edit').val());
                $.ajax({
                    url: 'assets/suc/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        $('#message-box-success').toggle();
                        $.when($(".editing_panel").slideUp("slow")).then(function (e) {
                            $(".agregarnuevo_panel,.nuevo_panel").slideDown("slow");
                            getSucursales();
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
                nombreEst = $(self).find(".nombreEst").text(),
                dirEst = $(self).find(".dirEst").text(),
                ciudadEst = $(self).find(".ciudadEst").text(),
                telEst = $(self).find(".telEst").text(),
                sectorEst = $(self).find(".sectorEst").text(),
                idtoedit = $(self).find(".idcontainerEst").text();
        $.when($(".agregarnuevo_panel,.ingredientes_lista,.editing_panel").slideUp("slow")).then(function (e) {
            $("#nombreEst_edit").val(nombreEst);
            $('#dirEst_edit').val(dirEst);
            $('#ciudadEst_edit').val(ciudadEst);
            $('#phoneEst_edit').val(telEst);
            $('#sectorEst_edit').val(sectorEst);
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
            getSucursales();
        });
    });

    $(document).on('click', '.delete_disco', function (e) {
        e.preventDefault();
        var self = this, id = $(self).parent().find(".idcontainerEst").text(), formData = new FormData();
        pageLoadingFrame('show');
        formData.append('deleteDisco', 'true');
        formData.append('deleteId', id);
        $.ajax({
            url: 'assets/suc/control.php',
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
                    getSucursales();
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
        getSucursales();
    });

    function getSucursales(e) {
        var formData = new FormData();
        formData.append('getSuc', 'true');
        $.ajax({
            url: 'assets/suc/control.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                $('.listadoSucursales').html(data);
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