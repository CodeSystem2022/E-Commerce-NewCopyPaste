<?php

namespace App\Validation\Backend\Usuarios\Categorias;

use App\Models\Backend\Usuarios\Categorias\CategoriasModel;

class CategoriasUsuariosValidation
{

    public function verificarExisteNombreCategoria(string $str, string $fields, array $data): bool
    {
        $model  = new CategoriasModel();
        $user = auth()->user();

        $model = $model
            ->where('nombre', $data['nombre'])
            ->where('usuario_id', $user->id)
            ->first();

        if ($model) {
            return false;
        }

        return true;
    }
}
