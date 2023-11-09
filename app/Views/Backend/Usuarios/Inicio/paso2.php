<?= $this->extend('Backend/Usuarios/Inicio/Layouts/base') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="jumbotron" style="margin-top: 150px;">
                <!-- alerta danger -->
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $validation->listErrors(); ?></strong>
                    </div>
                <?php } ?>
                <h1 class="display-4">Ingresa el Nombre de tu Tienda!</h1>
                <h1>


                </h1>
                <p class="lead">

                    <?= form_open(); ?>

                <div class="input-group input-group-lg">

                    <input type="text" name="nombre_tienda" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
                </p>
                <hr class="my-4">
                <p>Como quieres que se llame tu tienda?</p>
                <button type="submit" class="btn btn-primary btn-lg" role="button">Siguiente</button>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>