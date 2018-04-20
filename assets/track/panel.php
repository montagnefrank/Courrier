<?php
$select_ingredientes_list = "SELECT * FROM ingrediente";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Rastrear Carga</a></li>
    <li id="showmodal"> Consultar paquete <?php // echo md5(uniqid());   ?></li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-compass fa-lg"></i> Determinar ubicaci&oacute;n de la carga</h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<div class="row">
    <div class="row customalert displaynone">
        <div class="col-md-12">
            <div class="widget widget-info widget-item-icon">
                <div class="widget-item-left">
                    <span class="fas fa-exclamation-circle fa-5x"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-title">NotificaciÃ³n</div>
                    <div class="widget-subtitle">
                        <div role="alert" class="customalert_text">
                            Mensaje de error
                        </div>
                    </div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                             
            </div>
        </div>
    </div>
    <div class="col-md-12 searchboxrastrear">
        <div class="login-container login-v2">
            <div class="login-box animated fadeInDown">
                <div class="login-body" style="background: rgba(109, 202, 202, 0.5);">
                    <div class="login-title">Ingrese el <strong>tracking </strong> a rastrear.</div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ticket de Envio" id="cedula_input"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12 push-up-30">
                            <button class="btn btn-info btn-lg btn-block" id="leercedula_btn">Cargar</button>
                        </div>
                    </div>
                </div>                                    
            </div>
        </div>
    </div>
    <div class="row detalles_panel hidethis">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-box fa-lg"></i> Detalles del pedido
                </div>
                <div class="panel-body list-group border-bottom">
                    <a href="#" class="list-group-item"> Nombre Emisor <span class="badge badge-default nombreemisor_cont">18</span></a>                                
                    <a href="#" class="list-group-item"> Cedula Emisor <span class="badge badge-default cedulaemisor_cont">+7</span></a>
                    <a href="#" class="list-group-item"> Nombre Receptor <span class="badge badge-default nombrereceptor_cont">18</span></a>
                    <a href="#" class="list-group-item"> Cedula Receptor <span class="badge badge-default cedulareceptor_cont">18</span></a>
                    <a href="#" class="list-group-item"> Origen <span class="badge badge-default origen_cont">18</span></a>
                    <a href="#" class="list-group-item"> Destino <span class="badge badge-default destino_cont">18</span></a>
                    <a href="#" class="list-group-item"> Fecha de entrega <span class="badge badge-default fecha_cont">18</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-map-marker-alt fa-lg"></i> Ubicaci&oacute;n de la carga
                </div>
                <div class="panel-body">
                    <div id="googlemap" style="height:500px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> Respuesta Exitosa</div>
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