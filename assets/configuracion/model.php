
<script type='text/javascript'>
/* 
**************************************************
script para toar la informacion del formulario de insercion de un nuevo Destino/Origen
******************************


*/
    $(document).on('click', '.savenew_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if (
                    
                    
                    $('#nombre_input').val() != '' &&
                    $('#direccion_input').val() != '' &&
                    $('#ciudad_input').val() != '' &&
                    $('#telefono_input').val() != '' &&
                    $('#sector_input').val() != ''
                    ) 
            {
                var formData = new FormData();
                formData.append('addnewreg', 'true');
                formData.append('nombre', $('#nombre_input').val());
                formData.append('direccion', $('#direccion_input').val());
                formData.append('ciudad', $('#ciudad_input').val());
                formData.append('telefono', $('#telefono_input').val()); 
                formData.append('sector', $("#sector_input").val());
//                
                $.ajax({
                    url: 'assets/configuracion/control.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
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

    
</script>


<script type='text/javascript'>
/* 
**************************************************
script para mostrar es formulario de edicion de origen/destino /
******************************


*/
    $(document).on('click', '.edit_btn', function (e) {
        e.preventDefault();
        var self;
        self = this;
        $.when($(".editing_panel").slideUp("slow")).then(function () {
            $(".agregarnuevo_panel,.nuevo_panel").slideDown("slow");
        });
    });
    $(document).on('click', '.goback_ing_btn', function (e) {
        e.preventDefault();
        var self;
        self = this;
        $.when($(".agregarnuevo_panel,.editing_panel").slideUp("slow")).then(function () {
            $(".agregarnuevo_panel").slideDown("slow");
        });
    });
    
    $(document).on('click', '.singleing_row', function (e) {
        e.preventDefault();
        var self;
        self = this;
        
        text = $(self).find("#id").text();
                    
                    $("#id_edit").val(text);
                    
                    
         carga = $(self).find("#nombre").text();
            $('#nombre_edit').val(carga);
            
            
          placa = $(self).find("#direccion").text();
          $('#dir_edit').val(placa);
          
          modelo = $(self).find("#ciudad").text();
          $('#ciudad_edit').val(modelo);
          
          nombre = $(self).find("#telef").text();
          $('#telef_edit').val(nombre);
          
        apellido = $(self).find("#telef").text();
          $('#sector_edit').val(apellido);
          
          
          
        
        
        
        $.when($(".agregarnuevo_panel,.ingredientes_lista").slideUp("slow")).then(function () {
            $(".editing_panel").slideDown("slow");
            
        });
    });
    
   
</script>
<script type='text/javascript'>
/* 
**************************************************
script para tomar la informacion del formulario para editar el origen/destino /
******************************


*/
    $(document).on('click', '.edit_btn', function (e) {
        e.preventDefault();
        var self = this;
        pageLoadingFrame('show');
        setTimeout(function () {
            if (
                    $('#id_edit').val() != '' &&
                    $('#nombre_edit').val() != '' &&
                    $('#dir_edit').val() != '' &&
                    $('#ciudad_edit').val() != '' &&
                    $('#telef_edit').val() != '' &&
                    $('#sector_edit').val() != ''
                    ) 
            {
                var formData = new FormData();
                formData.append('addedit', 'true');
                formData.append('id_edit', $("#id_edit").val());
                formData.append('nombre_edit', $('#nombre_edit').val());
                formData.append('dir_edit', $('#dir_edit').val());
                formData.append('ciudad_edit', $('#ciudad_edit').val());
                formData.append('telef_edit', $('#telef_edit').val()); 
                formData.append('sector_edit', $("#sector_edit").val());
//                
                $.ajax({
                    url: 'assets/configuracion/editcontrol.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                       
                        pageLoadingFrame("hide");
                        $('.succesmessage_mb').html(data);
                        
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

     
</script>


