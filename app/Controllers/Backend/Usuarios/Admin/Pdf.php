<?php

namespace App\Controllers\Backend\Usuarios\Admin;

use App\Controllers\BaseController;
use Mpdf\Mpdf;


class Pdf extends BaseController
{
    public function index()
    {

        // $mpdf = new Mpdf();
        // $mpdf->WriteHTML('<h1>Hola mundo</h1>');



        // return redirect()->to($mpdf->Output('archivo.pdf', 'D'));

        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('Hello World');

        // Output a PDF file directly to the browser
        
        return redirect()->to($mpdf->Output('etiqueta.pdf', 'I'));
    }
}
