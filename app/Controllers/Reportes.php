<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Reportes extends BaseController {


    public function reporteCierresCaja() {
        
        $data = $this->acl();
        
        if ($data['is_logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $fecha_inicio = '2025-07-01 00:00:00';
            $fecha_fin = '2025-07-01 24:59:59';

            $data['ventas'] = $this->ventaModel->select('*')
                            ->join('clientes','ventas.idcliente=clientes.id')
                            ->where('fecha', $fecha_inicio)
                            ->orderBy('num_comprobante', 'asc')->findAll();

            //echo '<pre>'.var_export($data['ventas_dia'], true).'</pre>';exit;

            // $data['cierres'] = $this->cierreCajaModel->select('cierres_caja.id as id,monto_inicial,monto_final,nombre,fecha_inicio,fecha_cierre,total_ventas,cierres_caja.estado as estado,caja')
            //                 ->join('cajas','cierres_caja.idcaja=cajas.id','left')
            //                 ->join('usuarios','cierres_caja.idusuario=usuarios.id','left')
            //                 ->where("cierres_caja.fecha_inicio BETWEEN '$fecha_inicio' AND '$fecha_fin'")
            //                 ->orderBy('fecha_inicio', 'asc')->findAll();

            $data['title'] = 'Reportes';
            $data['subtitle']='Reporte de caja del 01-07-2025';
            $data['main_content'] = 'reportes/rep_cierres_caja';
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
