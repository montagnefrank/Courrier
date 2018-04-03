<div class="page-sidebar page-sidebar-fixed scroll mCustomScrollbar _mCS_1 mCS-autoHide">
    <ul class="x-navigation" id="barralateral">
        <li class="xn-logo">
            <a href="index.php?panel=index.php#autoscroll">Dirulo</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini fotoPerfil">
                <img src="<?php
                          $isavatar = "img/users/" . $_SESSION["usuario"]["nombreUsuario"] . ".jpg";
                          if (file_exists($isavatar)) {
                              echo "img/users/" . $_SESSION["usuario"]["nombreUsuario"];
                          } else {
                              echo "img/users/user";
                          }
                          ?>.jpg" alt="User"/>
            </a>
            <div class="profile">
                <div class="profile-image fotoPerfil">
                    <img src="<?php
                              $isavatar = "img/users/" . $_SESSION["usuario"]["nombreUsuario"] . ".jpg";
                              if (file_exists($isavatar)) {
                                  echo "img/users/" . $_SESSION["usuario"]["nombreUsuario"];
                              } else {
                                  echo "img/users/user";
                              }
                              ?>.jpg" alt="User"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">
                        <?php echo $_SESSION["usuario"]["nombresUsuario"]."<br>".$_SESSION["usuario"]["apellidosUsuario"]; ?>
                        <div class="profile-data-title">
                            <?php echo $_SESSION["usuario"]["idPerfil"]; ?>
                        </div>
                    </div>
                    <div class="profile-data-title nombreEstablecimiento">                        
                        <?php echo $_SESSION["usuario"]["nombreEstablecimiento"]." ".$_SESSION["usuario"]["sectorEstablecimiento"]; ?>
                    </div>
                </div>
                <div class="profile-controls">
                    <!--                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Menú principal</li>

        <?php


        if($_SESSION["usuario"]["idPerfil"] == "Super Usuario" || $_SESSION["usuario"]["idPerfil"] == "GERENTE / AFINES" || $_SESSION["usuario"]["idPerfil"] == "SOPORTE TECNICO"){
            echo '
            <li class="dashboard"><a href="index.php?panel=dashboard.php#autoscroll"><span class="fas fa-tachometer-alt"></span><span class="xn-text"> Dashboard</span></a></li> 
            <li class="pedidos"><a href="index.php?panel=index.php#autoscroll"><span class="fa fa-tags"></span><span class="xn-text"> Ingresos</span></a></li> 
             <li class="pedidos"><a href="index.php?panel=leer.php#autoscroll"><span class="fa fa-barcode"></span><span class="xn-text"> Operaci&oacute;n</span></a></li> 
             <li class="pedidos"><a href="index.php?panel=checkout.php#autoscroll"><i class="fas fa-box"></i><span class="xn-text"> Entregas</span></a></li> 
             <li class="pedidos"><a href="index.php?panel=sucursal.php#autoscroll"><span class="fa fa-industry"></span><span class="xn-text"> Sucursales</span></a></li> 
             <li class="pedidos"><a href="index.php?panel=discos.php#autoscroll"><span class="fa fa-truck"></span><span class="xn-text"> Discos</span></a></li>
             <li class="pedidos"><a href="index.php?panel=track.php#autoscroll"><i class="fas fa-globe"></i><span class="xn-text"> Rastrear</span></a></li>
             <li class="pedidos"><a href="index.php?panel=user.php#autoscroll"><i class="fas fa-users"></i><span class="xn-text"> Usuarios</span></a></li>
            ';
        }
        ?>
    </ul>
</div>