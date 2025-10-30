<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Productos extends BaseController {


    public function index() {

        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['productos'] = $this->articuloModel
                            ->select('articulos.id as id,articulos.nombre as nombre,codigo,precio_venta,stock,articulos.descripcion as descripcion,stock_min,articulos.estado as estado,categorias.nombre as categoria,tipo')
                            ->join('categorias', 'categorias.id = articulos.idcategoria','left')
                            
                            ->orderBy('nombre', 'asc')->findAll();
            $data['categorias'] = $this->categoriaModel->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Productos';
            $data['main_content'] = 'productos/grid_productos';
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
