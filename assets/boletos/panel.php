<?php
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);
$select_ingredientes_list = "SELECT * FROM establecimiento";
$result_ingredientes_list = mysqli_query($conn, $select_ingredientes_list);
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Gestión de Entregas</a></li>
    <li id="showmodal">Ingreso</li>
</ul>
<!-- FIN BREADCRUMB -->
<div class="col-md-12 col-sm-12">
    <h2><i class="fas fa-list-alt"></i> Gestionar los ingresos al sistema</h2>
</div>
<div class="col-md-10 agregarnuevo_panel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="col-md-3"><i class="fa fa-plus-circle"></i> Nuevo ingreso</h3> <br />
            </div>
            <form class="form-horizontal" role="form">                                    
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Origen</label>
                    <div class="col-md-9">
                        <select class="form-control select" data-live-search="true" data-style="btn-info" id="origen_select">
                            <option value='0'>Seleccione</option>
                            <?php
                            while ($row_ingredientes_list = mysqli_fetch_array($result_ingredientes_list)) {
                                echo "<option value='" . $row_ingredientes_list['idEstablecimiento'] . "'>" . $row_ingredientes_list['nombreEstablecimiento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Destino</label>
                    <div class="col-md-9">
                        <select class="form-control select" data-style="btn-success" id="destino_select">
                            <option value='0'>Seleccione</option>
                            <?php
                            mysqli_data_seek($result_ingredientes_list, 0);
                            while ($row_ingredientes_list = mysqli_fetch_array($result_ingredientes_list)) {
                                echo "<option value='" . $row_ingredientes_list['idEstablecimiento'] . "'>" . $row_ingredientes_list['nombreEstablecimiento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>     
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Fecha/Hora</label>
                    <div class="col-md-9">
                        <div class='input-group date' >
                            <input type='text' class="form-control" id='datetimepicker1' />
                            <span class="input-group-addon" >
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Disco</label>
                    <div class="col-md-9">
                        <select class="form-control select" data-style="btn-primary" id="discoselect">
                            <option value='0'>Seleccione</option>
                            <?php
                            $discos = "SELECT * FROM discos";
                            $dom_res = $conn->query($discos);
                            while ($dom_row = $dom_res->fetch_array(MYSQLI_BOTH)) {
                                echo "<option value='" . $dom_row[2] . "'>" . $dom_row[1] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    $discos = "SELECT * FROM discos";
                    $dom_res = $conn->query($discos);
                    while ($dom_row = $dom_res->fetch_array(MYSQLI_BOTH)) {
                        $placa = 'SELECT SUM(pesoIngreso) FROM ingresos WHERE placaIngreso = "' . $dom_row[2] . '" AND statusIngreso = "nuevo"';
                        $pesomax = $conn->query($placa);
                        $carga_cal = $pesomax->fetch_array(MYSQLI_BOTH);
                        $sumatoria = $dom_row[3] - $carga_cal[0];
                        if ($sumatoria < 1) {
                            $sumatoria = 0;
                        }
                        echo "<input id='cargamaxinput_" . $dom_row[2] . "' type='hidden' value='" . $sumatoria . "'> \n";
                    }
                    ?>
                </div>                                               
<!--                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label"># Placa</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Seleccione el disco" id="placavehiculo_input" readonly="readonly" style="color: black;">
                    </div>
                </div>  -->
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-label">Asientos</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input readonly="readonly" type="text" class="form-control" placeholder="Seleccione los asientos"/>
                            <span class="input-group-btn">
                                <button class="btn btn-default verasientosbtn" type="button">Ver asientos</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">                                    
                    <label class="col-md-9 control-label check"> Enviar Email al insertar <input value="1" type="checkbox" class="col-md-3 icheckbox" checked="checked" id="enviaremail_input"/></label>
                </div>           
                <!--                <div class="col-md-6">                                    
                                    <label class="col-md-9 control-label check"> Imprimir boleto <input value="1" type="checkbox" class="col-md-3 icheckbox" checked="checked" id="tagprint_input"/></label>
                                </div>           -->
            </form>
        </div>
        <div class="panel-footer">
            <h3 class="col-md-12"><i class="fa fa-user"></i> Datos de la persona que viaja</h3> <br />
        </div>
        <div class="panel-body">
            <div class="col-md-12">
            </div>
            <form class="form-horizontal" role="form">                                    
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Cedula</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="ingrese numero de cedula" id="numerocedula_input">
                    </div>  
                </div>
                <div class="form-group col-md-8">
                    <label class="col-md-3 control-label">Nombre y apellido</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nombre completo" id="nombre_input">
                    </div>
                </div>                                     
                <div class="form-group col-md-4">
                    <label class="col-md-3 control-label">Tel&eacute;fono</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Numero de telefono " id="phone_input">
                    </div>
                </div>                                     
                <div class="form-group col-md-8">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Correo electronico" id="email_input">
                    </div>
                </div>                                                
            </form>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success savenew_btn pull-right" ><i class="fa fa-save"></i> Guardar</button>
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