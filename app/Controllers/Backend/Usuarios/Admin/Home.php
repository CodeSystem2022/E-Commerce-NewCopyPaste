<?php

namespace App\Controllers\Backend\Usuarios\Admin;

use App\Controllers\BaseController;
use App\Models\Backend\Usuarios\Productos\ProductosModel;

class Home extends BaseController
{
    public function index()
    {
        $listarProductos = new ProductosModel();
        $user = auth()->user();
        $data = [
            'titulo' => 'Bienvenido '. $_SESSION['nombre_tienda'],
            'productos' => $listarProductos->where('usuario_id', $user->id)->findAll(),
            
        ];
        return view('Backend/Usuarios/Admin/Home/index', $data);
    }

    public function productos()
    {
        $data = [
            'titulo' => 'Bienvenido '. $_SESSION['nombre_tienda'],
            

        ];
        return view('Backend/Usuarios/Admin/Productos/index', $data);
    }
}
