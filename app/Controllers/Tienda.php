<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Frontend\Tienda\CarritosDetallesModel;
use App\Models\Frontend\Tienda\CarritosModel;
use App\Models\Frontend\Tienda\CategoriasTiendaModel;
use App\Models\Frontend\Tienda\ProductosTiendaModel;
use App\Models\Frontend\Tienda\TiendaModel;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class Tienda extends BaseController
{

    //creamos el constructor
    public function __construct()
    {
        //cargamos los helpers
        helper('carrito');
        helper('tienda');
    }

    public function index($nombre_tienda)
    {
        crearCarrito();
        $tienda = obtenerTienda($nombre_tienda);

        //aca verificamos si existe la tienda
        if ($tienda == false) {
            //enviamos un mensaje de error y redireccionamos al inicio
            $this->session->setFlashdata('error', 'Tienda no encontrada');
            return redirect()->to(base_url('/error'));
        }

        $ProductosYCategorias = obtenerProductosYCategoriasTienda($nombre_tienda);

        $data = [
            'productos' => $ProductosYCategorias['productos'],
            'categorias' => $ProductosYCategorias['categorias'],
            'titulo' =>  $tienda['nombre_tienda'],
            'tienda' => $tienda['site_name_user']
        ];

        //redireccionamos a la vista de la tienda
        return view('FrontendStore/inicio', $data);
    }

    public function carrito($nombre_tienda)

    {   
        ContarCantidadProductosCarrito();

        $carrito = crearCarrito();

        $carritos = new CarritosModel();
        $detalleCarrito = new CarritosDetallesModel();

        //aca verificamos si existe la tienda
        $verificarTienda = new TiendaModel();


        $tienda = $verificarTienda->where('site_name_user', $nombre_tienda)->first();





        //verificamos si la tienda existe
        if ($tienda == null) {
            //enviamos un mensaje de error y redireccionamos al inicio
            $this->session->setFlashdata('error', 'Tienda no encontrada');
            return redirect()->to(base_url('/error'));
        }
        //si la tienda existe, la almacenamos en la sesion

        $productos = new ProductosTiendaModel();
        $categoriaTienda =  new CategoriasTiendaModel();


        ///mercado pago
        // Step 1: Set your API credentials
        MercadoPagoConfig::setAccessToken("TOKENid");



        $productosCarrito = $detalleCarrito
            ->where('id_carrito', $carrito['id'])
            ->select('carritos_detalles.*, productos.nombre, productos.precio, productos.imagen')
            ->join('productos', 'productos.id = carritos_detalles.id_producto')
            ->findAll();


        $preference = NULL;
        if ($productosCarrito != null) {
            $totalaCobrar = 0;
            $cantidadProductos = 0;
            foreach ($productosCarrito as $producto) {
                $totalaCobrar += $producto['precio'] * $producto['cantidad'];
            }

            $client = new PreferenceClient();


            $preference = $client->create([
                "items" => array(
                    array(
                        "title" => $tienda['nombre_tienda'],
                        "quantity" => 1,
                        "currency_id" => "ARS",
                        "unit_price" => $totalaCobrar
                    )
                ),
                "back_urls" => [
                    "success" => "https://newcopypaste.tech/tienda/" . $tienda['site_name_user'] . "/pago/notificaciones",
                    "failure" => "https://newcopypaste.tech/tienda/" . $tienda['site_name_user'] . "/pago/notificaciones",
                    "pending" => "https://newcopypaste.tech/tienda/" . $tienda['site_name_user'] . "/pago/notificaciones",
                ],
            ]);
        }






        $data = [
            'productos' => $productos
                ->select('productos.*, categorias.nombre as categoria')
                ->where('productos.usuario_id', $tienda['id_user'])
                ->join('categorias', 'categorias.id = productos.categoria_id')
                ->findAll(),
            'categorias' => $categoriaTienda->where('usuario_id', $tienda['id_user'])->findAll(),
            'titulo' =>  $tienda['nombre_tienda'],
            'tienda' => $tienda['site_name_user'],
            'carrito' => $carritos
                ->where('user_session', $_SESSION['user_session'])
                ->findAll(),
            'carritoDetalle' => $detalleCarrito
                ->where('id_carrito', $carrito['id'])
                ->select('carritos_detalles.*, productos.nombre, productos.precio, productos.imagen')
                ->join('productos', 'productos.id = carritos_detalles.id_producto')
                ->findAll(),
            'preference' => $preference,

        ];



        return view('FrontendStore/carrito', $data);
    }

    public function agregarProductoCarrito($nombre_tienda, $id_producto)
    {
        helper('carrito');
        crearCarrito();

        $tiendas = new TiendaModel();
        $tienda = $tiendas->where('site_name_user', $nombre_tienda)->first();
        $carrito = new CarritosDetallesModel();
        $carrito->insert([
            'id_carrito' => $_SESSION['carrito_id'],
            'id_producto' => $id_producto,
            'cantidad' => 1
        ]);
        return redirect()->to(base_url('/tienda/' . $tienda['site_name_user'] . '/carrito'));
    }


    function eliminarProductoCarrito($nombre_tienda, $id_producto)
    {
        $tiendas = new TiendaModel();

        $tienda = $tiendas->where('site_name_user', $nombre_tienda)->first();

        $carrito = new CarritosDetallesModel();

        $carrito->where('id', $id_producto)->delete();

        if ($carrito->affectedRows() == 1) {
            $this->session->setFlashdata('success', 'Producto eliminado del carrito');
        } else {
            $this->session->setFlashdata('error', 'Error al eliminar el producto del carrito');
        }


        return redirect()->to(base_url('/tienda/' . $tienda['site_name_user'] . '/carrito'));
    }

    function sumarProductoCarrito($nombre_tienda, $id_producto)
    {
        $tiendas = new TiendaModel();

        $tienda = $tiendas->where('site_name_user', $nombre_tienda)->first();

        $carrito = new CarritosDetallesModel();

        $carrito->where('id', $id_producto)->set('cantidad', 'cantidad+1', FALSE)->update();

        if ($carrito->affectedRows() == 1) {
            $this->session->setFlashdata('success', 'Producto sumado al carrito');
        } else {
            $this->session->setFlashdata('error', 'Error al sumar el producto al carrito');
        }

        return redirect()->to(base_url('/tienda/' . $tienda['site_name_user'] . '/carrito'));
    }

    function restarProductoCarrito($nombre_tienda, $id_producto)
    {
        $tiendas = new TiendaModel();

        $tienda = $tiendas->where('site_name_user', $nombre_tienda)->first();

        $carrito = new CarritosDetallesModel();

        //$carrito->where('id', $id_producto)->set('cantidad', 'cantidad-1', FALSE)->update();

        //verificamos si la cantidad es mayor a 1
        $cantidad = $carrito->where('id', $id_producto)->first()['cantidad'];
        if ($cantidad > 1) {
            $carrito->where('id', $id_producto)->set('cantidad', 'cantidad-1', FALSE)->update();
        } else {
            $carrito->where('id', $id_producto)->delete();
        }

        if ($carrito->affectedRows() == 1) {
            $this->session->setFlashdata('success', 'Producto restado al carrito');
        } else {
            $this->session->setFlashdata('error', 'Error al restar el producto al carrito');
        }

        return redirect()->to(base_url('/tienda/' . $tienda['site_name_user'] . '/carrito'));
    }

    public function notificaciones($nombre_tienda)
    {
        helper('carrito');
        //aca verificamos si existe la tienda
        $verificarTienda = new TiendaModel();


        $tienda = $verificarTienda->where('site_name_user', $nombre_tienda)->first();

        $data = [

            'titulo' =>  $tienda['nombre_tienda'],
            'tienda' => $tienda['site_name_user'],
            'datosMP' => $_GET
        ];

        vaciarCarrito();

        return view('FrontendStore/notificaciones', $data);
    }

  
}
