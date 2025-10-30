<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Proveedores extends BaseController {

    public function acl() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->id;
        $data['logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['miembro_desde'] = $this->session->created_at;
        
        return $data;
    }

    public function gridProveedores(){
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['proveedores'] = $this->proveedorModel
                    ->select('*')
                    ->orderBy('nombre', 'asc')->findAll();
            $data['categorias'] = $this->categoriaModel->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Proveedores';
            $data['main_content'] = 'proveedores/grid_proveedores';
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
