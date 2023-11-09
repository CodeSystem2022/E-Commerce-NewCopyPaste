<?= $this->extend('Tiendas/Layouts/base') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">

    <section>
        <div class="row mt-5 justify-content-center">

            <?php foreach ($productos as $producto) { ?>

                <div class="card" style="width: 18rem; margin: 10px;">
                <!-- estirar la imagen -->
                    <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" class="card-img-top" style="height: 350px;" alt="...">
                    

                    <div class="card-body">
                        <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                        
                        <!-- mostrar solo 100 caracteres -->
                        <p class="card-text"><?= substr($producto['descripcion'], 0, 100) ?>...

                        



                        </p>
                    </div>
                    <ul class="list-group list-group-flush">

                        <!-- mostrar el precio $row['precio'] formateado -->

                        <li class="list-group-item">Precio: $<?= number_format($producto['precio'], 2, ',', '.') ?></li>
                        





                        <li class="list-group-item">Categoría: <?= $producto['categoria'] ?></li>
                        <li class="list-group-item">estado: <?= $producto['estado'] ? '<span class="badge text-bg-success">Dispobible</span>' : '<span class="badge text-bg-danger">No disponible</span>' ?></li>

                        

                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Agregar al carrito</a>
                        
                    </div>
                </div>

            <?php  } ?>




        </div>

    </section>



</div>



<?= $this->endSection() ?>