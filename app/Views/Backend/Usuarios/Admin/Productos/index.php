<?= $this->extend('Backend/Usuarios/Admin/Plantillas/base') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Productos</h3>
          <div class="card-tools">
            <a href="<?= base_url('/usuario/tienda/productos/nuevo') ?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Nuevo
            </a>

            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i>
            </button>


          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoria</th>

                <th>Estado</th>
                <th>Acciones</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $producto) : ?>
                <tr>
                  <td><?= $producto['nombre'] ?></td>
                  <!-- no mostrar toda la descripcion -->
                  <td><?= substr($producto['descripcion'], 0, 50) ?>...</td>
                  <td><?= $producto['precio'] ?></td>
                  <td><img src="<?= '/uploads/' . $producto['imagen'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2"></td>
                  <td><?= $producto['categoria'] ?></td>

                  <td><?= $producto['estado'] ? 'Activo' : 'Inactivo' ?></td>
                  <td>
                    <a href="<?= base_url('/usuario/tienda/productos/editar/' . $producto['id']) ?>" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></a>
                    <a title="Eliminar  Persona" class="btn btn-danger btn-sm" onclick="eliminarRegistro(url = '/usuario/tienda/productos/eliminar/<?= $producto['id'] ?>')"><i class="fas fa-trash"></i></a>
                  </td>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoria</th>

                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

    </div>
  </div>

</div>





<?= $this->endSection() ?>