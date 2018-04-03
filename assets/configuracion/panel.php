<?php
$select_ingredientes_list = "SELECT * FROM establecimiento";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=configurar.php">Sucursales</a></li>
    <li id="showmodal">Configuración</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><span class="fa fa-pencil-square-o"></span> Ingreso de Sucursales </h2>
</div>
<!--FIN INGREDIENTES RESUMEN-->
<div class="col-md-8 agregarnuevo_panel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="col-md-3"><i class="fa fa-plus-circle"></i> Nuevo ingreso</h3> <br />
            </div>
            <form class="form-horizontal" role="form">                                    
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nombre de la Sucursal" id="nombre_input">
                    </div>
                </div> 
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Direccion</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Direccion de la Sucursal" id="direccion_input">
                    </div>
                </div> 
                                                    
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Ciudad</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Ciudad de la Sucursal" id="ciudad_input">
                    </div>
                </div> 

                      
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Teléfono</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Teléfono de la Sucursal" id="telefono_input">
                    </div>
                </div>                               
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Sector</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Sector de la Sucursal" id="sector_input">
                    </div>
                </div>   
            </form>
    </div>
        </div>
        
        <div class="panel-footer">
            <button class="btn btn-success savenew_btn pull-right" style="margin-left: 16px; margin-bottom: 16px;"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
<!--Se coloca el panel para la edicion -->
<div class="col-md-8 editing_panel" style="display:none;">
    <h3 class="col-md-3"><i class="fa fa-edit"></i> Editar </h3>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form"> 
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Id </label>
                    <div class="col-md-10">
                        <input class="form-control" readonly="readonly" data-live-search="true" data-style="btn-info" id="id_edit">
                        
                            
                                                 
                    </div>
                </div>   
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Nombre</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nombre_edit"  >
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Dirección</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="dir_edit"  >
                    </div>
                </div>                                     
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Ciudad</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="ciudad_edit"  >
                    </div>
                </div>                                     
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Telefono</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="telef_edit"  >
                    </div>
                </div>                                     
                <div class="form-group col-md-5">
                    <label class="col-md-2 control-label">Sector</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="sector_edit"  >
                        
                    </div>
                </div>          
            </form>
        </div>
        <div class="panel-footer">
        <button class="btn btn-info goback_ing_btn" style="margin-left: 16px; margin-bottom: 16px;"><i class="fa fa-reply"></i> Regresar</button>
        
        <button class="btn btn-success edit_btn pull-right" style="margin-left: 16px; margin-bottom: 16px;"><i class="fa fa-refresh"></i> Actualizar</button>
        </div>
    </div>
</div>
<div class="col-md-8 nuevo_panel">
<div class="panel panel-default">
<!--Se coloca la siguiente seccion para editar las sucursales-->
    <div class="panel-footer">
            <h3 class="col-md-12"><i class="fa fa-truck"></i> Edición de Sucursales</h3> <br>
        </div>
</div>

    <div class="panel panel-default">
    <div class="panel-body">
                            <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">Id Sucursal</th>
                            <th width="20%">Sucursal</th>
                            <th width="20%">Dirección</th>
                            <th width="10%">Ciudad</th>
                            <th width="10%">Número</th>
                            <th width="10%">Sector</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      mysqli_data_seek($result_ingredientes_list,0);
                        while ($row_ingredientes_list = mysqli_fetch_array($result_ingredientes_list)) {
                            
                            echo "<tr style='cursor:pointer' class='singleing_row'>
                                    <td id='id'><strong>" . $row_ingredientes_list['idEstablecimiento'] . "</strong></td>
                                    <td id='nombre'><strong>" . $row_ingredientes_list['nombreEstablecimiento'] . "</strong></td>
                                    <td id='direccion'><strong>" . $row_ingredientes_list['direccionEstablecimiento'] . "</strong></td>
                                    <td id='ciudad'><strong>" . $row_ingredientes_list['ciudadEstablecimiento'] . "</strong></td>
                                    <td id='telef'><strong>" . $row_ingredientes_list['telefonoEstablecimiento'] . "</strong></td>
                                    <td id='sector'><strong>" . $row_ingredientes_list['sectorEstablecimiento'] . "</strong></td>
                                    
                                  
                                   
                                </tr>";
                                   
                                  
                        }
                        ?>
                    </tbody>
                </table>
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
