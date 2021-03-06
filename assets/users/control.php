<?php

/////////////////////////////////////////////////////////////////////////////// USERS CONTROL
/////////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


require ("../../assets/conn.php");
session_start();

if (isset($_POST['deleteUser'])) {
    $val_select = "DELETE FROM usuario WHERE idUsuario = '" . $_POST['deleteid'] . "'";
    $val_result = $conn->query($val_select) or die($conn->error);

    echo " Usuario Eliminado exitosamente. ";
}

if (isset($_POST['addnewUser'])) {

    $select = "SELECT nombreUsuario FROM usuario WHERE nombreUsuario = '" . $_POST['userUsuario'] . "';";
    $result = $conn->query($select) or die($conn->error);
    $row_cnt = $result->num_rows;

    if ($row_cnt > 0) {
        $msg_menu = " Ya existe el usuario en sistema, por favor seleccione un nombre de usuario diferente.";
        echo $msg_menu;
    } else {
        $val_select = "INSERT INTO usuario(passwordUsuario,nombreUsuario,idPerfil,cedulaUsuario,fechaingresoUsuario,nombresUsuario,apellidosUsuario,idEstablecimiento,statusUsuario,temaUsuario) "
                . "VALUES  ('" . $_POST['passUsuario'] . "','" . $_POST['userUsuario'] . "','" . $_POST['rolUsuario'] . "','" . $_POST['cedulaUsuario'] . "','" . date("Y-m-d") . "','" . $_POST['nombreUsuario'] . "','" . $_POST['apellidoUsuario'] . "','" . $_POST['estUsuario'] . "','1','dark')";
        $val_result = $conn->query($val_select) or die($conn->error);

        if ($val_result) {
            $msg_menu = " Nuevo Usuario ingresado al sistema exitosamente ";
            echo $msg_menu;
        } else {
            $msg_menu = " Error al crear el usuario, consulte con su departamento de soporte. ";
            echo $msg_menu;
        }
    }
}

if (isset($_POST['updateUser'])) {

    $val_select = "UPDATE usuario SET "
            . "nombreUsuario = '" . $_POST['userUsuario'] . "', "
            . "nombresUsuario = '" . $_POST['nombreUsuario'] . "', "
            . "apellidosUsuario = '" . $_POST['apellidoUsuario'] . "', "
            . "cedulaUsuario = '" . $_POST['cedulaUsuario'] . "' , "
            . "idEstablecimiento = '" . $_POST['estUsuario'] . "', "
            . "idPerfil = '" . $_POST['rolUsuario'] . "' "
            . "WHERE idUsuario = '" . $_POST['idUsuario'] . "'";
    $val_result = $conn->query($val_select) or die($conn->error);

    if ($val_result) {
        $msg_menu = " Se han actualizados los  datos del usuario exitosamente ";
        echo $msg_menu;
    } else {
        $msg_menu = " Error al actualizar el usuario, consulte con su departamento de soporte. ";
        echo $msg_menu;
    }
}

if (isset($_POST['getUsers'])) {
    $menu_select = "SELECT * FROM usuario";
    $menu_result = $conn->query($menu_select) or die($conn->error);
    $idlist = '';
    while ($menu_row = $menu_result->fetch_array(MYSQLI_BOTH)) {
        if ($menu_row['statusUsuario'] == 1) {
            $checked = 'checked';
        } else {
            $checked = '';
        }
        $isavatar = "../../img/users/" . $menu_row['nombreUsuario'] . ".jpg";
        if (file_exists($isavatar)) {
            $imgusuario = "img/users/" . $menu_row['nombreUsuario'];
        } else {
            $imgusuario = "img/users/default";
        }
        $rol = getrol($menu_row['idPerfil']);
        echo '   
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body profile bg-primary">
                            <div class="profile-image">
                                <img src="' . $imgusuario . '.jpg" alt="' . $menu_row['nombreUsuario'] . '">
                            </div>
                            <div class="profile-data">
                                <label class="switch edituserStatus">
                                    <input type="checkbox" class="switch" name="' . $menu_row['idUsuario'] . '_check"  value="1" ' . $checked . '/>
                                    <span></span>
                                </label>
                                <div class="profile-data-name">' . $menu_row['nombreUsuario'] . '</div>
                                <div class="profile-data-title">' . $menu_row['cedulaUsuario'] . '</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left deletemember" onClick="notyConfirm(' . $menu_row['idUsuario'] . ');"><span class="fa fa-times"></span></a>
                                <a href="#" class="profile-control-right edituser_btn"><span class="fa fa-edit"></span></a>
                            </div>
                        </div>
                        <div class="panel-body list-group">
                            <a href="#" class="list-group-item"><span class="help-block">Rol: ' . $rol . '</span></a>
                            <a href="#" class="list-group-item"><span class="help-block"><span>Establecimiento : ' . $menu_row['idEstablecimiento'] . '</span></span></a>
                        </div>   
                        <div class="hidethis_force idUsuario_cont">' . $menu_row['idUsuario'] . '</div>
                        <div class="hidethis_force userUsuario_cont">' . $menu_row['nombreUsuario'] . '</div>
                        <div class="hidethis_force nombreUsuario_cont">' . $menu_row['nombresUsuario'] . '</div>
                        <div class="hidethis_force apellidoUsuario_cont">' . $menu_row['apellidosUsuario'] . '</div>
                        <div class="hidethis_force cedulaUsuario_cont">' . $menu_row['cedulaUsuario'] . '</div>
                        <div class="hidethis_force estUsuario_cont">' . $menu_row['idEstablecimiento'] . '</div>
                        <div class="hidethis_force rolUsuario_cont">' . $menu_row['idPerfil'] . '</div>
                        <div class="hidethis_force imgUsuario_cont">' . $imgusuario . '</div>
                    </div>
                </div>
             ';
    }
}

if (isset($_POST['statusUser'])) {

    $val_select = "UPDATE usuario SET statusUsuario = '" . $_POST['loginUsuario'] . "' WHERE idUsuario = '" . $_POST['idUsuario'] . "'";
    $val_result = $conn->query($val_select) or die($conn->error);


    if ($val_result) {
        $msg_logo .= " Se ha cambiado el estatus del usuario <b>" . $_POST['nombreUsuario'] . "</b>.";
        echo $msg_logo;
    } else {
        echo " No pudimos cambiar el estatus del usuario. Intente de nuevo ";
    }
}

//OBTENEMOS EL NOMRBE DEL ROL SEGUN SU ID
function getrol($rol) {
    if ($rol == 1) {
        $nombreRol = "Super Usuario";
        return $nombreRol;
    }
    if ($rol == 2) {
        $nombreRol = "Administrador";
        return $nombreRol;
    }
    if ($rol == 3) {
        $nombreRol = "Operador";
        return $nombreRol;
    }
}

?>