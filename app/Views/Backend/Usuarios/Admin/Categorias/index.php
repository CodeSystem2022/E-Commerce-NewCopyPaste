<?= $this->extend('Backend/Usuarios/Admin/Plantillas/base') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title"> Listado de Categorias</h3>
                    <div class="card-tools">
                        <a href="<?= base_url('/usuario/tienda/categorias/nuevo') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo
                        </a>

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>


                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categorias as $categoria) : ?>
                                <tr>
                                    <td><?= $categoria['nombre'] ?></td>

                                    <td><?= $categoria['estado'] ? 'Activo' : 'Inactivo' ?></td>
                                    <td>
                                        <a href="<?= base_url('/usuario/tienda/categorias/editar/' . $categoria['id']) ?>" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></a>
                                        <a title="Eliminar  Persona" class="btn btn-danger btn-sm" onclick="eliminarCategoria(url = '/usuario/tienda/categorias/eliminar/<?= $categoria['id'] ?>')"><i class="fas fa-trash"></i></a>
                                    </td>

                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>

</div>





<?= $this->endSection() ?>