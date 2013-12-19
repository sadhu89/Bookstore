
<!-- FIN HEADER -->
<?php if (isset($mensajeEnviado)) { ?>
    <div class="form-group">
        <?= $mensajeEnviado ?>
    </div>
<?php } ?>
<?php if (isset($mensaje)) { ?>
    <div class="form-group">
        <?= $mensaje ?>
    </div>
<?php } ?>
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="centrar_imagen" src="<?=base_url()?>img/img1.png" alt="..." >
                        <div class="carousel-caption">

                        </div>
                    </div>
                    <div class="item">
                        <img class="centrar_imagen" src="<?=base_url()?>img/img2.png" alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>
        </div>

    </div>





</div>
