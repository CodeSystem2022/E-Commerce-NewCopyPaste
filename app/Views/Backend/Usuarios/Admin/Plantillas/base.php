<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titulo) ? $titulo : 'Tienda' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <!-- Select2 con thema  bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">






</head>



<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Alerta de que ya configuraste tu tienda -->
        <?php if (isset($_SESSION['error'])) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '<?php echo $_SESSION['error'] ?>',

                })
            </script>

        <?php } ?>

        <?php if (isset($_SESSION['mensaje'])) { ?>
            <script>
                Swal.fire('<?php echo $_SESSION['mensaje'] ?>')
            </script>

        <?php } ?>


        <?= $this->include('Backend/Usuarios/Admin/Plantillas/navbar') ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Tienda</span>
            </a>

            <!-- Sidebar -->
            <?= $this->include('Backend/Usuarios/Admin/Plantillas/sidebar') ?>
        </aside>

        <!-- Content Wrapper. Contains page content // español  
        Contenedor de contenido. Contiene contenido de página -->
        <div class="content-wrapper">

            <?= $this->include('Backend/Usuarios/Admin/Plantillas/content-header') ?>

            <?= $this->renderSection('content') ?>

        </div>

        <?= $this->include('Backend/Usuarios/Admin/Plantillas/control-sidebar') ?>

        <?= $this->include('Backend/Usuarios/Admin/Plantillas/footer') ?>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- DataTables  & Plugins  Bootstrap 4-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <!-- Select2 con thema  bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/Gruntfile.min.js"></script>
    <!-- Javascript personalizado -->
    <script src="/js/DataTable.js"></script>
    <script src="/js/Select2.js"></script>
    <script src="/js/Sweetalert2.js"></script>

</body>


</html>