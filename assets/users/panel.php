<?php
////////////////////////////////////////////////////////////////////////////USERS  VIEW
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="index.php?panel=index.php">Inicio </a></li>
    <li>Usuarios</li>
</ul>
<!-- BREADCRUMB --> 
<div class="page-title">                    
    <h2><span class="fa fa-users"></span> Administraci&oacute;n de Usuarios</h2>
</div>    
<div class="page-content-wrap">   
    <div class="row customalert hidethis">
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
    <?php
    if (isset($_SESSION['msg'])) {
        echo '
                <div class="row notificactionbox">
                    <div class="col-md-12">
                        <div class="widget widget-';
        echo $_SESSION['box'];
        echo ' widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-exclamation"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-title">Notificación</div>
                                <div class="widget-subtitle">
                                    <div role="alert">
                                        ' . $_SESSION['msg'] . '
                                    </div>
                                </div>
                            </div>
                            <div class="widget-controls">                                
                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                            </div>                             
                        </div>
                    </div>
                </div>
        ';
        unset($_SESSION['msg']);
    }
    ?>
    <div class="col-md-4 newuser_btn">                        
        <a href="#" class="tile tile-info tile-valign ">
            <span>Nuevo </span> <span class="fa fa-plus-square"></span>
            <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;width: 100%;" />
        </a>                        
    </div> 
    <div class="col-md-4 cancel_btn hidethis">                        
        <a href="#" class="tile tile-primary tile-valign ">
            <span>Regresar </span> <span class="fa fa-arrow-circle-left"></span>
            <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;width: 100%;" />
        </a>                        
    </div> 
    <div class="col-md-4 savenew_btn hidethis" id="savenew_btn">                        
        <a href="#" class="tile tile-success tile-valign ">
            <span>Guardar </span> <span class="fa fa-save"></span>
            <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;width: 100%;" />
        </a>                        
    </div> 
    <div class="col-md-4 saveedit_btn hidethis" id="saveedit_btn">                        
        <a href="#" class="tile tile-success tile-valign ">
            <span>Actualizar </span><i class="fas fa-sync-alt"></i>
            <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;width: 100%;" />
        </a>                        
    </div> 
    <div class="col-md-12 hidethis newuser_panel push-up-20">   
        <div class="row">                        
            <div class="col-md-5 col-sm-5 col-xs-5">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">                                
                        <div class="panel-body">
                            <div class="text-center" id="user_image">
                                <img src="img/users/default.jpg" class="img-thumbnail"/>
                            </div>                                    
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">usuario</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="username_input" type="text" placeholder="Usuario del sistema" class="form-control alphanumonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">contrase&ntilde;a</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="password_input" type="password" placeholder="Ingrese la contrase&ntilde;a" class="form-control" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">confirmar</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="passwordconf_input" type="password" placeholder="Confirme la contrase&ntilde;a" class="form-control" required="required"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><i class="fas fa-pencil-alt"></i> Perfil de usuario</h3>
                            <p>Ingrese la informaci&oacute;n del usuario.</p>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Nombre</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="usernombre_input" type="text" value="" placeholder="Ingresa el nombre" class="form-control alphaonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Apellido</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="userapellido_input" type="text" value="" placeholder="Ingresa el Apellido" class="form-control alphaonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Cedula</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="usercargo_input" type="text" value="" placeholder="Cargo en la empresa" class="form-control alphaonly" required="required"/>
                                </div>
                            </div>                                        
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Establecimiento</label>
                                <div class="col-md-9 col-xs-7">
                                    <select id="newuser_est_select" class="form-control select" data-style="btn-success">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Ambato</option>
                                        <option value="2">Guayaquil</option>
                                        <option value="3">Quito</option>
                                    </select>
                                </div>
                            </div>                                        
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Rol</label>
                                <div class="col-md-9 col-xs-7">
                                    <select id="newuser_rol_select" class="form-control select" data-style="btn-success">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Super usuario</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Operador</option>
                                    </select>
                                </div>
                            </div>       
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 hidethis edituser_panel push-up-20">   
        <div class="row">                        
            <div class="col-md-5 col-sm-5 col-xs-5">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">                                
                        <div class="panel-body">
                            <div class="text-center" id="edituser_image">
                                <img src="img/users/default.jpg" class="img-thumbnail"/>
                            </div>                                    
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">usuario</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="editusername_input" type="text" placeholder="Usuario del sistema" class="form-control alphanumonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <div class="col-md-12 col-xs-12">
                                    <a class="btn btn-danger btn-block btn-rounded restpass_btn" >Restablecer contrase&ntilde;a</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-edit"></span> Perfil de usuario</h3>
                            <p>Aqu&iacute; puede actualizar la informaci&oacute;n del usuario.</p>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Nombre</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="editusernombre_input" type="text" value="" placeholder="Ingresa el nombre" class="form-control alphaonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Apellido</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="edituserapellido_input" type="text" value="" placeholder="Ingresa el apellido" class="form-control alphaonly" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Cedula</label>
                                <div class="col-md-9 col-xs-7">
                                    <input id="editusercargo_input" type="text" value="" placeholder="Cargo en la empresa" class="form-control numonly" required="required"/>
                                </div>
                            </div>                                        
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Establecimiento</label>
                                <div class="col-md-9 col-xs-7">
                                    <select id="edituser_est_select" class="form-control select" data-style="btn-success">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Ambato</option>
                                        <option value="2">Guayaquil</option>
                                        <option value="3">Quito</option>
                                    </select>
                                </div>
                            </div>                                        
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Rol</label>
                                <div class="col-md-9 col-xs-7">
                                    <select id="edituser_rol_select" class="form-control select" data-style="btn-success">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Super usuario</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Operador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hidethis_force edituser_id_cont"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 userlist_panel push-up-20">   
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-users"></span> Usuarios del sistema</h3>                                                
        </div>
        <div class="panel-body usersList">
            <!--LOS USUARIOS SE MUESTRAN DE FORMA DINANICA-->
        </div>
    </div>
</div>