<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titulo) ? $titulo : 'Unión Vecinal FB' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

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
            <?= $this->include('Backend/Plantillas/sidebar') ?>
        </aside>

        <!-- Content Wrapper. Contains page content // español  
        Contenedor de contenido. Contiene contenido de página -->
        <div class="content-wrapper">

            <?= $this->include('Backend/Plantillas/content-header') ?>

            <?= $this->renderSection('content') ?>

        </div>

       <?= $this->include('Backend/Plantillas/control-sidebar') ?>

        <?= $this->include('Backend/Plantillas/footer') ?>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>

</html>