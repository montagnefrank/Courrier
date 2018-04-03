<?php
$select_ingredientes_list = "SELECT * FROM ingrediente";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Gestión de Entregas</a></li>
    <li id="showmodal"> Entrega de paquetes en oficina</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-list-alt"></i> Recepci&oacute;n de paquetes</h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<div class="row">
    <div class="row customalert displaynone">
        <div class="col-md-12">
            <div class="widget widget-info widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-exclamation"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-title">Notificación</div>
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
    <div class="col-md-12">
        <div class="login-container login-v2">
            <div class="login-box animated fadeInDown">
                <div class="login-body" style="background: rgba(109, 202, 202, 0.5);">
                    <div class="login-title"><strong>Por favor</strong>, escanee el ticket.</div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ticket de Envío" id="cedula_input"/>
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
    <div class="row results displaynone">
        <div class="col-md-12">
            <div class="panel panel-default push-up-30">
                <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="col-md-3"><i class="fa fa-plus-circle"></i> DATOS DEL ENVÍO</h3> <br />
                    </div>
                    <form class="form-horizontal" role="form">                                    
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Origen</label>
                            <div class="col-md-9">
                                <label id="origen"></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Placa</label>
                            <div class="col-md-9">                       
                                <label id="disco"></label>
                            </div>
                        </div>       

                        <div class="form-group col-md-4">
                            <label class="col-md-4 control-label">Fecha/Hora</label>
                            <div class="col-md-8">                        
                                <label id="fecha"></label>
                            </div>
                        </div>       
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Destino</label>
                            <div class="col-md-9">
                                <label id="destino"></label>
                            </div>
                        </div>                         

                    </form>
                </div>
                <div class="panel-footer">
                    <h3 class="col-md-12"><i class="fa fa-truck"></i> Datos de la carga</h3> <br />
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                    </div>
                    <form class="form-horizontal" role="form">                                    
                        <div class="form-group col-md-6">
                            <label class="col-md-5 control-label">Peso (Kg)</label>
                            <div class="col-md-7">
                                <label id="peso"></label>
                            </div>
                        </div> 
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-label">Observaciones</label>
                            <div class="col-md-12">
                                <label id="observ"></label>
                            </div>
                        </div>                                               
                    </form>
                </div>
                <div class="panel-footer">
                    <h3 class="col-md-12"><i class="fa fa-user"></i> Datos de la persona que envía</h3> <br />
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                    </div>
                    <form class="form-horizontal" role="form">                                    
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Cedula</label>
                            <div class="col-md-9">
                                <label id="cedula"></label>
                            </div>  
                        </div>
                        <div class="form-group col-md-8">
                            <label class="col-md-3 control-label">Nombre y apellido</label>
                            <div class="col-md-9">
                                <label id="nombres"></label>
                            </div>
                        </div>                                     
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Tel&eacute;fono</label>
                            <div class="col-md-9">
                                <label id="telef"></label>
                            </div>
                        </div>                                     
                        <div class="form-group col-md-8">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <label id="email"></label>
                            </div>
                        </div>                                                
                    </form>
                </div>
                <div class="panel-footer">
                    <h3 class="col-md-12"><i class="fa fa-user"></i> Datos de la persona que recibe</h3> <br />
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                    </div>
                    <form class="form-horizontal" role="form">                                    
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Cedula</label>
                            <div class="col-md-9">
                                <label id="recedula"></label>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="col-md-3 control-label">Nombre y apellido</label>
                            <div class="col-md-9">
                                <label id="renombre"></label>
                            </div>
                        </div>                                     
                        <div class="form-group col-md-4">
                            <label class="col-md-3 control-label">Tel&eacute;fono</label>
                            <div class="col-md-9">
                                <label id="retelef"></label>
                            </div>
                        </div>                                     
                        <div class="form-group col-md-8">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <label id="reemail"></label>
                            </div>
                        </div>                                                
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
</div>
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> Lectura finalizada</div>
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