<?php
$select_ingredientes_list = "SELECT * FROM ingrediente";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Gestión de Entregas </a></li>
    <li id="showmodal">Ingreso </li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><span class="fa fa-pencil-square-o"></span> Gestionar los ingresos al sistema</h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<div class="col-md-8 agregarnuevo_panel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="col-md-3"><i class="fa fa-plus-circle"></i> Nuevo ingreso</h3> <br />
            </div>
            <form class="form-horizontal" role="form">      
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Cedula</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="ingrese numero de cedula" id="numerocedula_input">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-5 control-label">Cantidad de Boletos</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Ingrese la cantidad" id="cantidadBoletos">
                    </div>
                </div>  
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success savenew_btn pull-right" style="margin-left: 16px; margin-bottom: 16px;"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
</div>
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> Ingresado a Sistema</div>
            <div class="mb-content">
                <p class="succesmessage_mb"></p>
            </div>
            <div class="mb-footer">
            </div>
        </div>
    </div>
</div>
<div class="message-box message-box-danger animated fadeIn" id="message-box-danger">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> error</div>
            <div class="mb-content">
                <p class="errormessage_mb"></p>
            </div>
            <div class="mb-footer">
            </div>
        </div>
    </div>
</div>