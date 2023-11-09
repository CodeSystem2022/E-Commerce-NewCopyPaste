<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
        </div>
    </div>

    <!-- SidebarSearch Form -->

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/usuario/tienda" class="nav-link active">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Incio
                        
                    </p>
                </a>
            </li>

            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Productos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/usuario/tienda/productos" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Productos</p>
                        </a>
                    </li>
                    
                </ul>
            </li>


            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Categorias
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/usuario/tienda/categorias" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Categorias</p>
                        </a>
                    </li>
                    
                </ul>
            </li>


            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Salir</p>
                </a>
            </li>
        </ul>
    </nav>


</div>
<!-- /.sidebar -->