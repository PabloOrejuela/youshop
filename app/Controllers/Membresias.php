<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Membresias extends BaseController {

    private $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    public function __construct(){

        $this->mes = date('m');
        $this->anio = date('Y');

    }

    public function index() {

        $data = $this->acl();
        
        if ($data['logged'] == 1 ) {
            
            $data['session'] = $this->session;

            return redirect()->to('membresias');
        }else{
            $this->logout();
        }
    }

    public function membresias_inicio() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();
            
            $data['title'] = 'Membresías';
            $data['subtitle']='Inicio';
            $data['main_content'] = 'membresias/inicio';
            return view('dashboard/index_membresias', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }
}
