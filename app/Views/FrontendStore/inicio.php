<?php $this->extend('FrontendStore/Layouts/base') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid mb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">PRODUCTOS</span>
    </h2>
    <div class="row px-xl-5">
        <?php foreach ($productos as $producto) : ?>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= base_url('uploads/' . $producto['imagen']); ?>" alt="product-img" style="height: 300px; object-fit: cover;">
                        <div class="product-action">
                            <a class="btn btn-outline-dark" href="/tienda/<?= $tienda?>/carrito/agregar/producto/<?= $producto['id']?>"><i class="fa fa-shopping-cart"></i> Agregar al Carrito</a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">
                            <?php
                            //mostrar el nombre del producto hasta 20 caracteres
                            echo strlen($producto['nombre']) > 30 ? substr($producto['nombre'], 0, 30) . '...' : $producto['nombre'];
                            
                            ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?= number_format($producto['precio'], 0, '', '.'); ?></h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                            <small class="far fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>




<?= $this->endSection() ?>