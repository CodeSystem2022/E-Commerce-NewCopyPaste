<?php

namespace App\Validation\Backend\Usuarios\Productos;

use App\Models\Backend\Usuarios\Productos\ProductosModel;

class ProductoUsuarioValidation
{
    // public function custom_rule(): bool
    // {
    //     return true;
    // }

    public function verificarExisteNombreProducto(string $str, string $fields, array $data): bool
    {
        $model = new ProductosModel();
        $user = auth()->user();

        $producto = $model
            ->where('nombre', $data['nombre'])
            ->where('usuario_id', $user->id)
            ->first();

        if ($producto) {
            return false;
        }

        return true;
    }
}
