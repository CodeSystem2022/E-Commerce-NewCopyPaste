<?php

namespace App\Controllers;

use App\Models\Frontend\Tienda\TiendaModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Frontend/index');
    }

    public function contacto(): string
    {
        return view('Frontend/contacto');
    }

    public function precios(): string
    {
        return view('Frontend/precios');
    }

    public function detalles(): string
    {
        return view('Frontend/detalles');
    }


    public function errorTienda()
    {
        return view('Frontend/error');
    }
}
