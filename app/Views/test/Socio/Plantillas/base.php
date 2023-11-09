<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titulo) ? $titulo : 'Unión Vecinal FB' ?></title>
    <?= $this->include('Backend/Plantillas/css') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?= $this->include('Backend/Plantillas/navbar') ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Unión Vecinal FB</span>
            </a>

            <!-- Sidebar -->
            <?= $this->include('Backend/Socio/Plantillas/sidebar') ?>
        </aside>

        <!-- Content Wrapper. Contains page content // español  
        Contenedor de contenido. Contiene contenido de página -->
        <div class="content-wrapper">

            <?= $this->include('Backend/Plantillas/content-header') ?>

            <?= $this->renderSection('content') ?>

        </div>

        <?= $this->include('Backend/Socio/Plantillas/control-sidebar') ?>

        <?= $this->include('Backend/Plantillas/footer') ?>
    </div>

    <?= $this->include('Backend/Plantillas/js') ?>
</body>

</html>