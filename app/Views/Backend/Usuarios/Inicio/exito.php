<?= $this->extend('Backend/Usuarios/Inicio/Layouts/base') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron" style="margin-top: 150px;">
        <h1 class="display-4 text-primary">Bienvenido/a <?= $_SESSION['nombre_tienda'] ?></h1>
        <h1 class="display-4">Configuro su tienda correctamente</h1>
        <p class="lead">A partir de ahora puedes empezar a vender tus productos</p>
        <hr class="my-4">
        <p> Click en el boton Finalizar para ir a tu tienda</p>
        <a class="btn btn-primary btn-lg" href="/usuario/tienda" role="button">Finalizar</a>
      </div>
    </div>
  </div>

</div>


<?= $this->endSection() ?>