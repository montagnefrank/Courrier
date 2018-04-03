<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=discos.php">Discos</a></li>
    <li>Agregar Nuevo</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-list-alt"></i> Ingreso De Discos</h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<!--insertar discos-->

<div class="col-md-10 listado_panel">
    <div class="panel panel-default">
        <div class="panel-heading">	
            <h3><span class="fa fa-truck"></span> Edición De Discos</h3>
        </div>
        <div class="panel-body">
            <table  class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="20%">Disco</th>
                        <th width="20%">Placa</th>
                        <th width="10%">Carga</th>
                        <th width="10%">Modelo</th>
                        <th width="10%">Nombre</th>
                        <th width="10%">Apellidos</th>
                        <th width="10%">Cédula</th>
                        <th width="10%">Tel&eacute;fono</th>
                        <th width="10%">GPS Tracking</th>
                        <th width="10%">Dispositivo</th>
                        <th width="10%">Borrar</th>
                    </tr>
                </thead>
                <tbody class="listadoDiscos">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-10 agregarnuevo_panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><i class="fa fa-plus-circle"></i>Nuevo Ingreso</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">                                    
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Número</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Número de Disco" id="disco_input" 
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="N&uacute;mero de Disco">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Placa</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Placa de Disco" id="placa_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Placa de Disco">
                    </div>
                </div> 

                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Carga</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Carga Disponible (KG)" id="carga_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Carga Disponible (KG)">
                    </div>
                </div> 

                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Modelo</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Modelo Camión" id="modelo_input" 
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Modelo Camión">
                    </div>
                </div> 

                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Nombres</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nombres Conductor" id="nombreconduc_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Nombres Conductor">
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Apellidos</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Apellidos Conductor" id="apellidoconduc_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Apellidos Conductor">
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Cédula</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Cédula Conductor" id="idconduc_input" 
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Cédula Conductor">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Tel&eacute;fono Conductor</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Telefono Conductor" id="phone_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Telefono Conductor">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">GPS Tracking</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="GPS Tracking" id="gpsphone_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="GPS Tracking">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Modelo GPS</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Seleccione el tipo de GPS" id="devicetype_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Dispositivo GPS">
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success savedisco_btn pull-right" ><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
</div>
<div class="col-md-10 editing_panel displaynone" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><i class="fas fa-edit"></i>Editar</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">                                    
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Disco</label>
                    <div class="col-md-9">
                        <input class="form-control" data-live-search="true" data-style="btn-info" id="disco_edit">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Placa</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="placa_edit" >
                    </div>
                </div>                                     
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Carga</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="carga_edit"  >
                    </div>
                </div>                                     
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Modelo</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="modelo_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Nombres</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nombre_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Apellidos</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="apellido_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Cédula</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="id_edit"  >
                    </div>
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Tel&eacute;fono Conductor</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="phone_edit"  >
                    </div>
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">GPS Tracking</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="gpsphone_edit"  >
                    </div>
                </div>  
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Modelo GPS</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="devicetype_edit"  >
                        <input type="text" class="form-control displaynone" id="idcontanier_edit"  >
                    </div>
                </div>  
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-info goback_ing_btn"><i class="fa fa-reply"></i>Regresar</button>
            <button class="btn btn-success edit_disco_btn pull-right" ><i class="fas fa-sync-alt"></i> Actualizar</button>
        </div>
    </div>
</div>
<!--Mostrar el mensaje de si se ingreso al sistema -->
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
<!--Mostrar el mensaje de que no se ingreso al sistema -->
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