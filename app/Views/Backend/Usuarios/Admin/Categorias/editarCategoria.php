<?= $this->extend('Backend/Usuarios/Admin/Plantillas/base') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de registro de Categorias</h3>
                    <div class="card-tools">


                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>


                    </div>
                </div>

                <?= form_open_multipart('/usuario/tienda/categorias/editar/' . $categoria['id']) ?>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la categoria</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria" value="<?= $categoria['nombre'] ?>">
                            </div>



                        </div>



                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>


                <?= form_close() ?>

            </div>

        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informacion de la tienda</h3>
                    <div class="card-tools">


                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>


                    </div>
                </div>




                <div class="card-body">
                    <div class="row">

                        <!-- mostrar las validaciones -->

                        <?php if (isset($validation)) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>



                    </div>


                </div>



            </div>

        </div>


    </div>

</div>




<?= $this->endSection() ?>