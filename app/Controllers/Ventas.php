<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Ventas extends BaseController {

    public function ventas() {

        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['ventas'] = $this->ventaModel
                            ->select('*')
                            ->join('clientes', 'clientes.id = ventas.idcliente','left')
                            ->orderBy('ventas.id', 'asc')->findAll();
            
            $data['title'] = 'Ventas';
            $data['subtitle']='Facturas';
            $data['main_content'] = 'ventas/grid_ventas';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }
}
