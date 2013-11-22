<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/cliente/index">
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar cliente" name="cliente" id="cliente">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <p class="text-right">
            <a href="#" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NOMBRES Y APELLIDOS</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">CONTRASEŅA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        
                        <td class="media-body"><a href="#" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="#" class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
