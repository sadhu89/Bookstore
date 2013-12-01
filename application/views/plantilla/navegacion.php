
<!-- HEADER -->
<div class="header">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            
            <div class="row">
                <div class="col-md-8"><a href="<?php echo base_url(); ?>home/" class="navbar-brand nav-text" style="text-align:center; font-family: 'helvetic'; ">UNIVERSIDAD NACIONAL MAYOR DE SAN MARCOS <strong style="font-size:22px;">FONDO EDITORIAL</strong></a></div>
                <div class="col-md-4"><img src="<?= base_url()?>img/escudo.png"></div>
            </div>
            
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse color1" role="navigation" >
            <ul class="nav navbar-nav navbar-right">
                <!--visitante-->
                <?php if ($this->session->userdata('cliente') == FALSE) { ?>
                    <li class="<?= $activo == 'registro' ? 'active' : '' ?> "><a class="nav-text" href="<?php echo base_url(); ?>cliente/registro"> Reg�strate</a></li>
                    <li class="dropdown">
                        <a class="nav-text" href="<?= base_url()?>cliente/showLogin" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>  Iniciar Sesi�n <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu">
                            <form method="post" action="<?php echo base_url(); ?>cliente/login">
                                <input class="form-control" type="email" placeholder="E-mail" id="email" name="email" required />
                                <input class="form-control" type="password" placeholder="Contrase�a" id="password" name="password" required>
                                <label>
                                    <input type="checkbox" name="recordar">Recordarme
                                </label>
                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                            </form>
                        </div>
                    </li>
                    <?php
                } else {
                    $array_sesion = $this->session->userdata('cliente');
                    ?>
                    <!--logueado-->
                    <li class="dropdown">
                        <a class="nav-text" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>  <?= $array_sesion['nombre']?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mi perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Configuraci�n</a></li>
                            <li><a href="<?php echo base_url(); ?>cliente/logout">Cerrar Sesi�n</a></li>
                        </ul>
                    </li>

                <?php } ?> 
            </ul>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse color2 redondear" role="navigation" ">
            <ul class="nav navbar-nav navbar-left">
                <li class="<?= $activo == 'inicio' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>home/" class="nav-text"> <span class="glyphicon glyphicon-home"></span> INICIO</a></li>
                <li class="<?= $activo == 'nosotros' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>nosotros" class="nav-text"> <span class="glyphicon glyphicon-briefcase"></span> NOSOTROS</a></li>
                <li class="<?= $activo == 'catalogo' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>catalogo" class="nav-text"> <span class="glyphicon glyphicon-book"></span> CAT�LOGO</a></li>
                <li class="<?= $activo == 'carrito' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>carrito" class="nav-text"> <span class="glyphicon glyphicon-shopping-cart"></span> CARRITO</a></li>
                <li class="<?= $activo == 'contacto' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>contacto" class="nav-text"> <span class="glyphicon glyphicon-edit"></span> CONTACTO</a></li>
            </ul>
        </div>

</div>
