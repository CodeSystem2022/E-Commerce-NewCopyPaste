<?php

namespace App\Controllers\Backend\Usuarios;

use App\Controllers\BaseController;
use App\Models\Backend\Usuarios\Configuracion\SiteConfigUserModel;

class Inicio extends BaseController
{
    public function index()
    {
        $ConfiguracionSitio = new SiteConfigUserModel();

        //verificar si el usuario ya tiene configurado el sitio
        $user = auth()->user();

        $site_config_user = $ConfiguracionSitio->where('id_user', $user->id)->first();

        //si el usuario ya tiene configurado el sitio, guardamos en una variable de sesion el nombre de la tienda y el id del usuario para poder usarlo en la vista
        if ($site_config_user) {
            $newdata = [
                //a la variable de sesion que se llama site_name_user reemplazando los espacios por guiones y en minuscula 
                'site_name_user' => str_replace(' ', '-', strtolower($site_config_user['nombre_tienda'])),
                'nombre_tienda' => $site_config_user['nombre_tienda'],
                'id_user' => $user->id,
                'username' => $user->username
            ];
            //guardamos la variable de sesion
            
            $this->session->set($newdata);
        }

        //Si el usuario ya tiene configurado el sitio, lo redireccionamos a la pagina de usuario/tienda
        if ($site_config_user) {
            return redirect()->to(base_url('/usuario/tienda'));
        }

        //Si el usuario no tiene configurado el sitio, lo redireccionamos a la pagina de inicio de configuracion
        return view('Backend/Usuarios/Inicio/index');
    }

    public function paso2()
    {
        //verificar si el usuario ya tiene configurado el sitio
        $user = auth()->user();

        $ConfiguracionSitio = new SiteConfigUserModel();

        //d($_POST);

        if ($this->request->getMethod() == 'post') {

            //validacion de formulario unique
            $rules = [
                'nombre_tienda' => 'required|is_unique[site_config_user.nombre_tienda]'
            ];

            $errors = [
                'nombre_tienda' => [
                    'required' => 'El nombre de la tienda es requerido',
                    'is_unique' => 'El nombre de la tienda ya existe'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                return view('Backend/Usuarios/Inicio/paso2', $data);
            }

            $site_name_user = $this->request->getPost('nombre_tienda');




            $ConfiguracionSitio->save([
                'nombre_tienda' => $site_name_user,
                'site_name_user' => str_replace(' ', '-', strtolower($site_name_user)),
                'id_user' => $user->id,
                
            ]);

            $newdata = [
                //a la variable de sesion que se llama site_name_user reemplazando los espacios por guiones y en minuscula 
                'site_name_user' => str_replace(' ', '-', strtolower($site_name_user)),
                'nombre_tienda' => $site_name_user,
                'id_user' => $user->id,
                'username' => $user->username
                
            ];

            $session = session();

            $session->set($newdata);

            //mensaje de exito
            $session = session();
            $session->setFlashdata('success', 'Configuracion de sitio guardada correctamente');
            return redirect()->to(base_url('/inicio/exito'));
        }






        return view('Backend/Usuarios/Inicio/paso2');
    }

    public function exito()
    {
        $ConfiguracionSitio = new SiteConfigUserModel();

        return view('Backend/Usuarios/Inicio/exito');
    }
}
