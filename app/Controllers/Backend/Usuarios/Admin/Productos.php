<?php

namespace App\Controllers\Backend\Usuarios\Admin;

use App\Controllers\BaseController;
use App\Models\Backend\Usuarios\Productos\CategoriasModel;
use App\Models\Backend\Usuarios\Productos\ProductosModel;

class Productos extends BaseController
{
    public function index()
    {
        $productos = new ProductosModel();
        $user = auth()->user();

        $data = [
            'productos' => $productos
                ->select('productos.*, categorias.nombre as categoria')
                ->where('productos.usuario_id', $user->id)
                ->join('categorias', 'categorias.id = productos.categoria_id')
                ->findAll(),
            'titulo' => 'Bienvenido ' . $_SESSION['nombre_tienda'],

        ];
        return view('Backend/Usuarios/Admin/Productos/index', $data);
    }

    public function nuevo()
    {
        $user = auth()->user();
        $productos = new ProductosModel();
        $categorias = new CategoriasModel();

        $data = [
            'titulo' => 'Agregar Producto',
            'categorias' => $categorias->where('usuario_id', $user->id)->findAll(),
        ];

        if ($this->request->getMethod() == 'post') {

            //validacion de formulario unique
            $rules = [
                'nombre' => 'required|verificarExisteNombreProducto[nombre]',
                'descripcion' => 'required',
                'categoria_id' => 'required',
                'precio' => 'required',
                'imagen' => 'uploaded[imagen]|max_size[imagen,2048]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]',
            ];

            $errors = [
                'nombre' => [
                    'required' => 'El nombre del producto es requerido',
                    'is_unique' => 'El nombre del producto ya existe',
                    'verificarExisteNombreProducto' => 'El nombre del producto ya existe'
                ],
                'descripcion' => [
                    'required' => 'La descripcion del producto es requerida'
                ],
                'categoria_id' => [
                    'required' => 'La categoria del producto es requerida'
                ],
                'precio' => [
                    'required' => 'El precio del producto es requerido'
                ],
                'imagen' => [
                    'uploaded' => 'Debe subir una imagen',
                    'max_size' => 'La imagen es muy grande, maximo 2MB',
                    'is_image' => 'El archivo seleccionado no es una imagen',
                    'mime_in' => 'El archivo seleccionado no es una imagen'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                //obtenemos la imagen
                $imagen = $this->request->getFile('imagen');

                //verificamos si no hay errores
                if ($imagen->getError() == 4) {
                    $nombreImagen = 'producto.png';
                } else {
                    //generamos un nombre aleatorio
                    $nombreImagen = $imagen->getRandomName();

                    //movemos la imagen a la carpeta public/uploads
                    $imagen->move(ROOTPATH . 'public/uploads', $nombreImagen);
                }

                $productos->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'precio' => $this->request->getPost('precio'),
                    'imagen' => $nombreImagen,
                    'categoria_id' => $this->request->getPost('categoria_id'),
                    'usuario_id' => $user->id,
                    'estado' => 1
                ]);

                return redirect()->to(base_url('/usuario/tienda/productos'))->with('mensaje', 'Producto agregado correctamente');
            }
        }


        return view('Backend/Usuarios/Admin/Productos/nuevoProducto', $data);
    }

    //funcion para eliminar un producto
    public function eliminar($id)
    {
        $productos = new ProductosModel();
        $producto = $productos->where('id', $id)->first();

        //verificamos si el producto existe
        if ($producto == null) {
            return redirect()->to(base_url('/usuario/tienda/productos'))->with('mensaje', 'El producto no existe');
        }

        //verificamos si el producto le pertenece al usuario
        $user = auth()->user();
        if ($producto['usuario_id'] != $user->id) {
            return redirect()->to(base_url('/usuario/tienda/productos'))->with('mensaje', 'El producto no existe');
        }

        //eliminamos el producto
        $productos->delete($id);

        //eliminamos la imagen
        if ($producto['imagen'] != 'producto.png') {
            unlink(ROOTPATH . 'public/uploads/' . $producto['imagen']);
        }

        

        return redirect()->to(base_url('/usuario/tienda/productos'))->with('mensaje', 'Producto eliminado correctamente');
    }
}
