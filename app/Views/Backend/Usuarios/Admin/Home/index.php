<?= $this->extend('Backend/Usuarios/Admin/Plantillas/base') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Ultimos Productos Vendidos</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>


                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Ventas</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($productos as $producto) : ?>

                                <tr>
                                    <td>
                                        <img src="<?= '/uploads/' . $producto['imagen'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                                        <?= $producto['nombre'] ?>
                                    </td>
                                    <td>$ <?= number_format($producto['precio'], 2, ',', '.') ?></td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            0%
                                        </small>
                                        0 Vendidos
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>






        </div>
    </div>

</div>





<?= $this->endSection() ?>