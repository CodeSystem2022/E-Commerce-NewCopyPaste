<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <?= $this->include('FrontendStore/Layouts/css') ?>
</head>

<body>
    <!-- Topbar Start -->
    <?= $this->include('FrontendStore/Layouts/nombreTienda') ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <?= $this->include('FrontendStore/Layouts/categorias') ?>
            <?= $this->include('FrontendStore/Layouts/menu') ?>
        </div>
    </div>
    <!-- End Navbar -->

    <!-- <? //= $this->include('FrontendStore/Layouts/carousel') 
            ?>  -->

    <p><?= $this->renderSection('contenido') ?></p>

    




    <?= $this->include('FrontendStore/Layouts/footer') ?>




    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <?= $this->include('FrontendStore/Layouts/js') ?>
</body>

</html>