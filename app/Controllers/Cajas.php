<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cajas extends BaseController {

    public function cajas() {
        
        $data = $this->acl();
        
        if ($data['is_logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['cajas'] = $this->cierreCajaModel->select('cierres_caja.id as id,monto_inicial,monto_final,nombre,fecha_inicio,fecha_cierre,total_ventas,cierres_caja.estado as estado,caja')
                            ->join('cajas','cierres_caja.idcaja=cajas.id','left')
                            ->join('usuarios','cierres_caja.idusuario=usuarios.id','left')
                            ->orderBy('fecha_inicio', 'asc')->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Cajas';
            $data['main_content'] = 'cajas/grid_cajas';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function gridCierresCaja() {
        
        $data = $this->acl();
        
        if ($data['is_logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['cierres'] = $this->cierreCajaModel->select('cierres_caja.id as id,monto_inicial,monto_final,nombre,fecha_inicio,fecha_cierre,total_ventas,cierres_caja.estado as estado,caja')
                            ->join('cajas','cierres_caja.idcaja=cajas.id','left')
                            ->join('usuarios','cierres_caja.idusuario=usuarios.id','left')
                            ->orderBy('fecha_inicio', 'asc')->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Cierres de caja';
            $data['main_content'] = 'cajas/grid_cierres_caja';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function nuevoCierreCaja() {
        
        $data = $this->acl();
        
        if ($data['is_logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['cierres'] = $this->cierreCajaModel->select('cierres_caja.id as id,monto_inicial,monto_final,nombre,fecha_inicio,fecha_cierre,total_ventas,cierres_caja.estado as estado,caja')
                            ->join('cajas','cierres_caja.idcaja=cajas.id','left')
                            ->join('usuarios','cierres_caja.idusuario=usuarios.id','left')
                            ->orderBy('fecha_inicio', 'asc')->findAll();

            $data['title'] = 'Administración';
            $data['subtitle']='Cierres de caja';
            $data['main_content'] = 'cajas/grid_cierres_caja';
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
