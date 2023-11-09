<?php

namespace App\Controllers\Backend\Usuarios\Admin;

use App\Controllers\BaseController;
use App\Models\Backend\Usuarios\Categorias\CategoriasModel;
use App\Models\Backend\Usuarios\Productos\ProductosModel;

class Categorias extends BaseController
{
    public function index()
    {
        $categorias = new CategoriasModel();
        $user = auth()->user();

        $data = [
            'titulo' => 'Bienvenido ' . $_SESSION['nombre_tienda'],
            'categorias' => $categorias->where('usuario_id', $user->id)->findAll(),


        ];
        return view('Backend/Usuarios/Admin/Categorias/index', $data);
    }

    //funcion nuevo

    public function nuevo()
    {
        $categorias = new CategoriasModel();
        $user = auth()->user();

        $data = [
            'titulo' => 'Bienvenido ' . $_SESSION['nombre_tienda'],
            'categorias' => $categorias->where('usuario_id', $user->id)->findAll(),
        ];

        if ($this->request->getMethod() == 'post') {

            //validacion de formulario unique
            $rules = [
                'nombre' => 'required|verificarExisteNombreCategoria[nombre]',

            ];

            $errors = [
                'nombre' => [
                    'required' => 'El nombre de la categoria es requerido',
                    'is_unique' => 'El nombre de la categoria ya existe',
                    'verificarExisteNombreCategoria' => 'El nombre de la categoria ya existe'
                ],
                'estado' => [
                    'required' => 'El estado de la categoria es requerido'
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $categorias->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'estado' => true,
                    'usuario_id' => $user->id,
                ]);

                return redirect()->to(base_url('/usuario/tienda/categorias'))->with('mensaje', 'Categoria agregada con exito');
            }
        }

        return view('Backend/Usuarios/Admin/Categorias/nuevaCategoria', $data);
    }

    //funcion eliminar

    public function eliminar($id)
    {
        $categorias = new CategoriasModel();
        $producto = new ProductosModel();

        $categorias->delete($id);
       

        return redirect()->to(base_url('/usuario/tienda/categorias'))->with('mensaje', 'Categoria eliminada con exito');
    }

    //funcion editar

    public function editar($id)
    {
        $categorias = new CategoriasModel();
        $user = auth()->user();

        $data = [
            'titulo' => 'Bienvenido ' . $_SESSION['nombre_tienda'],
            'categorias' => $categorias->where('usuario_id', $user->id)->findAll(),
            'categoria' => $categorias->where('id', $id)->first(),
        ];

        if ($this->request->getMethod() == 'post') {

            //validacion de formulario unique
            $rules = [
                'nombre' => 'required|verificarExisteNombreCategoria[nombre]',

            ];

            $errors = [
                'nombre' => [
                    'required' => 'El nombre de la categoria es requerido',                    
                    'verificarExisteNombreCategoria' => 'El nombre de la categoria ya existe'
                ],
               
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $categorias->update($id, [
                    'nombre' => $this->request->getPost('nombre'),
                    'estado' => true,
                    'usuario_id' => $user->id,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                return redirect()->to(base_url('/usuario/tienda/categorias'))->with('mensaje', 'Categoria editada con exito');
            }
        }

        return view('Backend/Usuarios/Admin/Categorias/editarCategoria', $data);
    }
}
