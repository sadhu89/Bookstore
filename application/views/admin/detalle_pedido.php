<div class="contenedor">
    <div class="panel panel-info centrado">
        <div class="panel-heading text-center">
            <h3 class="panel-title"><span class="bold"><?=$titulo?></span></h3>
        </div>
        <div class="panel-body col-6">
            <div class="text-center">
                <label>Pedido ID:</label><span class="bold">  <?= $pedido->id?></span>
            </div>
            <div class="row marketing">
                <div class="col-lg-6">
                    <div>
                        <label>Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= ucfirst($pedido->Nombre)?>" disabled required>
                        <?php echo form_error('nombre'); ?>
                    </div>
                    <div>
                        <label>Fecha del Pedido</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            <input type="text" class="form-control" name="fecha" value="<?= date('d - m - Y',strtotime($pedido->FechaPedido))?>" disabled="" required>
                            <?php echo form_error('fecha'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label>Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= ucfirst($pedido->Apellidos)?>" disabled required>
                        <?php echo form_error('apellido'); ?>
                    </div>
                    <div>
                        <label for="email">Fecha de Recogo</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            <input type="text" class="form-control" name="fechar" value="<?= date('d - m - Y',strtotime($pedido->FechaRecogo))?>" disabled="" required>
                            <?php echo form_error('fechar'); ?>
                        </div>
                    </div>
                </div>
                <div class="container col-lg-6 centrado">
                    <div class="form-group">
                        <br><br><label>Estado</label> 
                        <?php
                        $estado = $pedido->Estado;
                        switch ($estado) {
                            case 'En proceso':$badge = 'info';
                                break;
                            case 'Suspendido':$badge = '';
                                break;
                            case 'Faltan existencias':$badge = 'important';
                                break;
                            case 'Entregado':$badge = 'success';
                                break;
                            case 'Impagado':$badge = 'falta';
                                break;
                            case 'Cancelado':$badge = 'cancel';
                                break;
                            default:$badge = 'other';
                                break;
                        }
                        ?>
                        <label><span class="badge badge-<?=$badge?>"> <?= $pedido->Estado?></span></label> 
                    </div><br>
                </div>
            </div>

            <div class="container">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">NOMBRE PRODUCTO</th>
                            <th class="text-center">CANTIDAD</th>
                            <th class="text-center">PRECIO SIN IGV</th>
                            <th class="text-center">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $suma = 0.0;
                        foreach ($libro as $lb) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $lb->Titulo?></td>
                                <td class="text-center"><?= $lb->Unidades?></td>
                                <td class="text-center">
    <?php $precio = ($lb->Precio) * 100 / 118; ?>
                                    <span class="label label-primary"><?= round($precio,2)?></span>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $precioTotal = $precio * ($lb->Unidades);
                                    $suma += $precioTotal;
                                    ?>
                                    <span class="label label-default"><?= round($precioTotal,2)?></span>
                                </td>
                            </tr>
                        <?php
                        }
                        $nuevoIGV = $suma * 118 / 100;
                        $nuevoTotal = $suma + $nuevoIGV;
                        ?>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">SUBTOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-success"><strong><?= round($suma,2)?></strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">IGV</span></td>
                            <td class="text-center">
                                <span class="label label-warning"><strong><?= round($nuevoIGV,2) ?></strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="bold">TOTAL</span></td>
                            <td class="text-center">
                                <span class="label label-danger"><?= round($nuevoTotal,2) ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
