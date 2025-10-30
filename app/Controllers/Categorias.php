<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Categorias extends BaseController {

    public function index(){

        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['categorias'] = $this->categoriaModel->orderBy('nombre', 'asc')->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Categorías';
            $data['main_content'] = 'categorias/grid_categorias';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function registrarNuevaCategoria() {
        
        $data = [
            'nombre' => strtoupper($this->request->getPostGet('nombre')),
            'descripcion' => strtoupper($this->request->getPostGet('descripcion')),
            'tipo' => $this->request->getPostGet('tipo')
        ];
        $this->categoriaModel->insert($data);

        $res = $this->categoriaModel->orderBy('nombre', 'asc')->findAll();

        //header('Content-Type: application/json');
        echo json_encode([
            'success' => true, 
            'mensaje' => 'Categoría registradad correctamente',
            'res' => $res
        ]);
        exit;
    }
}
