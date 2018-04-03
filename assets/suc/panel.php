<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=sucursal.php">Sucursales</a></li>
    <li>Agregar Nuevo</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-list-alt"></i> Manejo de Sucursales</h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<!--insertar discos-->

<div class="col-md-10 listado_panel">
    <div class="panel panel-default">
        <div class="panel-heading">	
            <h3><span class="fa fa-industry"></span> Edición de Sucursales</h3>
        </div>
        <div class="panel-body">
            <table  class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="20%">Nombre</th>
                        <th width="20%">Direccion</th>
                        <th width="10%">Ciudad</th>
                        <th width="10%">Tel&eacute;fono</th>
                        <th width="10%">Sector</th>
                        <th width="10%">Borrar</th>
                    </tr>
                </thead>
                <tbody class="listadoSucursales">
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
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nombre Establecimiento" id="nombreEst_input" 
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Nombre Establecimiento">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Placa</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Direccion Establecimiento" id="dirEst_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Direccion Establecimiento">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Ciudad</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Ciudad de Establecimiento" id="ciudadEst_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Ciudad de Establecimiento">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Tel&eacute;fono</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Tel&eacute;fono" id="telEst_input" 
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Tel&eacute;fono">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Sector</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Sector Establecimiento" id="serctorEst_input"
                               data-toggle="tooltip" data-placement="right" title="" data-original-title="Sector Establecimiento">
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success saveEst_btn pull-right" ><i class="fa fa-save"></i> Guardar</button>
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
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nombreEst_edit" >
                    </div>
                </div>                                     
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Direcci&oacute;n</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="dirEst_edit"  >
                    </div>
                </div>                                     
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Ciudad</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="ciudadEst_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Tel&eacute;fono</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="phoneEst_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Sector</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="sectorEst_edit"  >
                        <input type="text" class="form-control displaynone" id="idcontanier_edit"  >
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-info goback_ing_btn"><i class="fa fa-reply"></i>Regresar</button>
            <button class="btn btn-success edit_est_btn pull-right" ><i class="fa fa-refresh"></i> Actualizar</button>
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