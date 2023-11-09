<?php $this->extend('FrontendStore/Layouts/base') ?>

<?= $this->section('contenido') ?>

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Productos</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    <?php foreach ($carritoDetalle as $detalles) : ?>


                        <tr>
                            <td class="align-middle">
                                <img src="<?= base_url('uploads/' . $detalles['imagen']) ?>" alt="" style="width: 50px;">
                                <?= substr($detalles['nombre'], 0, 30) . '...' ?>
                            </td>
                            <td class="align-middle" id="precio">
                                <?= number_format($detalles['precio'], 0, '', '.'); ?>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="/tienda/<?= $tienda ?>/carrito/restar/producto/<?= $detalles['id'] ?>" class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?= $detalles['cantidad'] ?>">
                                    <div class="input-group-btn">
                                        <a href="/tienda/<?= $tienda ?>/carrito/sumar/producto/<?= $detalles['id'] ?>" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" id="total"><?= number_format($detalles['precio'] * $detalles['cantidad'], 0, '', '.'); ?></td>
                            <td class="align-middle">
                                <a href="/tienda/<?= $tienda ?>/carrito/eliminar/producto/<?= $detalles['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Codigo de cupón" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-primary" disabled>Aplicar Cupón</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tu orden</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">

                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Envio</h6>
                        <h6 class="font-weight-medium">Gratis</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>


                            <?php

                            $totalFinal = 0;


                            foreach ($carritoDetalle as $detalles) {

                                $total = $detalles['precio'] * $detalles['cantidad'];
                                $totalFinal += $total;
                            }


                            echo number_format($totalFinal, 0, '', '.');

                            ?>


                        </h5>
                    </div>
                    <!-- <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceder al pago</button> -->
                    <div id="wallet_container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


<?php if ($preference != null) { ?>
    <script>
        const mp = new MercadoPago('TEST');
        const bricksBuilder = mp.bricks();


        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "<?= $preference->id ?>"
            },
        });
    </script>


<?php } ?>


<?= $this->endSection() ?>