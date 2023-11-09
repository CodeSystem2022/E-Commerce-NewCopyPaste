<?= $this->extend('Backend/Usuarios/Admin/Plantillas/base') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de registro de productos</h3>
                    <div class="card-tools">


                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>


                    </div>
                </div>

                <?= form_open_multipart('/usuario/tienda/productos/nuevo') ?>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre del producto</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" value="<?= set_value('nombre') ?>">
                            </div>

                            <div class="form-group">
                                <label>Categorias</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="categoria_id" value="<?= set_value('categoria_id') ?>">
                                    <option value="" selected="selected">Selecciona una categoria</option>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option  <?= set_select('categoria_id', $categoria['id']) ?> value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
                                    <?php endforeach; ?>





                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion del producto</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion del producto"><?= set_value('descripcion') ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="precio">Precio del producto</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del producto" value="<?= set_value('precio') ?>">
                            </div>

                            <div class="form-group">
                                <label for="imagen">Imagen del producto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                        <label class="custom-file-label" for="exampleInputFile">Elegir imagen</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Subir</span>
                                    </div>
                                </div>
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