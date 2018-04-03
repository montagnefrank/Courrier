<?php
$select_ingredientes_list = "SELECT * FROM ingrediente";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Gestión de Entregas</a></li>
    <li id="showmodal"> Salida de paquetes</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-list-alt"></i> Entrega a clientes</h2>
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
</div>
<div class="col-md-4 searchboxpedidos">
    <div class="login-container login-v2">
        <div class="login-box animated fadeInDown">
            <div class="login-body" style="background: rgba(128, 202, 109, 0.5);">
                <div class="login-title"><strong>Ingrese</strong>, el tracking o C&eacute;dula.</div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="B&uacute;squeda r&aacute;pida" id="cedula_input"/>
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
<div class="col-md-12 listadoregistros displaynone">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Total de registros</h3>
        </div>

        <div class="panel-body panel-body-table">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-actions">
                    <thead>
                        <tr>
                            <th width="50">tracking</th>
                            <th>Emisor</th>
                            <th>Origen</th>
                            <th width="100">estado</th>
                            <th>Receptor</th>
                            <th>Destino</th>
                            <th width="100">Cedula Receptor</th>
                            <th width="100">Tipo de entrega</th>
                            <th width="120">Entregar</th>
                        </tr>
                    </thead>
                    <tbody class="listado_callback">         
                    </tbody>
                </table>
            </div>                                

        </div>
        <div class="panel-footer">
            <button class="btn btn-info pull-right despacharpedidos"><i class="fas fa-check-circle fa-lg"></i> Entregar Paquetes</button>
            <button class="btn btn-primary pull-left buscarnuevobtn"><i class="fas fa-search fa-lg"></i> Buscar Nuevo</button>
        </div>                                                
    </div>                                                

</div>
<div class="col-md-8 displaynone registardespachopanel">
    <form action="#" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><i class="fas fa-user-circle"></i> Datos de cliente</h3>
                <p>Por favor ingrese los datos de la persona que retira los pedidos</p>
            </div>
            <div class="panel-body form-group-separated">
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">Nombres</label>
                    <div class="col-md-9 col-xs-7">
                        <input type="text" class="form-control despachonombre_input"/>
                        <input type="hidden" class="form-control recibenombre_input"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">C&eacute;dula</label>
                    <div class="col-md-9 col-xs-7">
                        <input type="text" class="form-control despachocedula_input"/>
                        <input type="hidden" class="form-control recibecedula_input"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">Tel&eacute;fono</label>
                    <div class="col-md-9 col-xs-7">
                        <input type="text" class="form-control despachotelefono_input"/>
                        <input type="hidden" class="form-control recibetelefono_input"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">Email</label>
                    <div class="col-md-9 col-xs-7">
                        <input type="text" class="form-control despachoemail_input"/>
                        <input type="hidden" class="form-control recibeemail_input"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">Comentarios</label>
                    <div class="col-md-9 col-xs-7">
                        <textarea class="form-control despachocoment_input" rows="3"></textarea>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-md-2 col-xs-5 control-label">Trackings a Despachar</label>
                    <div class="col-md-9 col-xs-7 despachartrackings_container">
                    </div>
                    <input type="hidden" class="form-control despachartrackings_input"/>
                </div>                                          
                <div class="form-group">
                    <div class="col-md-12 col-xs-5">
                        <button class="btn btn-primary btn-rounded pull-right despacharpedidos_btn"><i class="fas fa-truck fa-lg"></i> Despachar productos</button>
                        <button class="btn btn-info btn-rounded pull-left buscarnuevobtn"><i class="fas fa-search fa-lg"></i> Buscar Nuevo</button>
                        <button class="btn btn-success btn-rounded pull-left mismousuario push-left20"><i class="fas fa-user"></i> Usar datos de sistema</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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