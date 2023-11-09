<?= $this->extend('Backend/Usuarios/Inicio/Layouts/base') ?>

<?= $this->section('contenido') ?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron" style="margin-top: 150px;">
        <h1 class="display-4">Bienvenido a la configuracion de tu tienda</h1>
        <p class="lead">Esta es la configuracion inicial de tu tienda, por favor ingresa el nombre de tu tienda</p>
        <hr class="my-4">
        <p>Cuando termines de configurar tu tienda, podras empezar a vender tus productos</p>
        <a class="btn btn-primary btn-lg" href="/inicio/paso2" role="button">Siguiente</a>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>