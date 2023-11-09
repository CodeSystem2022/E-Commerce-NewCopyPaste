<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Rutas para el frontend
$routes->get('/', 'Home::index');
$routes->get('/precios', 'Home::precios');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/detalles', 'Home::detalles');
$routes->get('/error', 'Home::errorTienda');

//Rutas para la tienda del usuario
$routes->get('/tienda/(:segment)', 'Tienda::index/$1');
$routes->get('/tienda/(:segment)/carrito', 'Tienda::carrito/$1');
//https://newcopypaste.tech/tienda/mendoza-tienda/carrito/agregar/producto/123
$routes->match(['get', 'post'], '/tienda/(:segment)/carrito/agregar/producto/(:num)', 'Tienda::agregarProductoCarrito/$1/$2');
//https://newcopypaste.tech/tienda/mendoza-tienda/carrito/eliminar/producto/123
$routes->get('/tienda/(:segment)/carrito/eliminar/producto/(:num)', 'Tienda::eliminarProductoCarrito/$1/$2');

//https://newcopypaste.tech/tienda/mendoza-tienda/carrito/sumar/producto/14
$routes->get('/tienda/(:segment)/carrito/sumar/producto/(:num)', 'Tienda::sumarProductoCarrito/$1/$2');
//https://newcopypaste.tech/tienda/mendoza-tienda/carrito/restar/producto/14
$routes->get('/tienda/(:segment)/carrito/restar/producto/(:num)', 'Tienda::restarProductoCarrito/$1/$2');

//https://newcopypaste.tech/tienda/pago/notificaciones
$routes->get('/tienda/(:segment)/pago/notificaciones', 'Tienda::notificaciones/$1');

//https://newcopypaste.tech/tienda/pagos
$routes->get('/carrito/pagos', 'Tienda::realizarPagos');


//https://newcopypaste.tech/usuario/tienda/pdf
$routes->get('usuario/tienda/pdf', 'Backend\Usuarios\Admin\Pdf::index');

service('auth')->routes($routes);

$user = service('auth')->user();

if (auth()->loggedIn()) {

    //rutas visibles para el grupo admin
    if ($user->inGroup('admin')) {
        // $routes->group('home', ['filter' => 'admin'], function ($routes) {
        //     $routes->get('/', 'Backend\Admin\Home::index');
        //     $routes->get('vista/para/los/administradores', 'Backend\Admin\Home::index');
        // });
    }

    //rutas visibles para el grupo user
    if ($user->inGroup('user')) {
        $routes->group('inicio', function ($routes) {
            $routes->get('/', 'Backend\Usuarios\Inicio::index');
            $routes->get('paso2', 'Backend\Usuarios\Inicio::paso2', ['filter' => 'verificarTienda']);
            $routes->post('paso2', 'Backend\Usuarios\Inicio::paso2', ['filter' => 'verificarTienda']);
            $routes->get('exito', 'Backend\Usuarios\Inicio::exito');
        });
        $routes->group('usuario', function ($routes) {

            //$routes->get('(:any)', 'Backend\Usuarios\Admin\Home::index');
            $routes->get('tienda', 'Backend\Usuarios\Admin\Home::index');
            $routes->get('tienda/productos', 'Backend\Usuarios\Admin\Productos::index');
            $routes->match(['get', 'post'], 'tienda/productos/nuevo', 'Backend\Usuarios\Admin\Productos::nuevo');
            $routes->get('tienda/productos/eliminar/(:num)', 'Backend\Usuarios\Admin\Productos::eliminar/$1');


            //https://newcopypaste.tech/usuario/tienda/categorias
            $routes->get('tienda/categorias', 'Backend\Usuarios\Admin\Categorias::index');
            $routes->match(['get', 'post'], 'tienda/categorias/nuevo', 'Backend\Usuarios\Admin\Categorias::nuevo');
            //https://newcopypaste.tech/usuario/tienda/categorias/eliminar/3
            $routes->get('tienda/categorias/eliminar/(:num)', 'Backend\Usuarios\Admin\Categorias::eliminar/$1');
            //https://newcopypaste.tech/usuario/tienda/categorias/editar/3
            $routes->match(['get', 'post'], 'tienda/categorias/editar/(:num)', 'Backend\Usuarios\Admin\Categorias::editar/$1');
        });
    }
}
