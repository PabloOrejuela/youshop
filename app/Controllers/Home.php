<?php

namespace App\Controllers;

class Home extends BaseController {

    private $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    private $mes;
    private $anio;

    public function __construct(){

        $this->mes = date('m');
        $this->anio = date('Y');

    }

    public function index(): string {

        $data = $this->acl();
        
        if ($data['is_logged'] == 1 ) {
            
            $data['session'] = $this->session;

            $this->sessionModel->_cierraSesiones();
            return redirect()->to('inicio');
        }else{
            $this->logout();
        }
    }

    public function getClientIp() {
        $ip = null;

        // Lista de cabeceras comunes que podrían contener la IP real
        $headers = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];

        foreach ($headers as $key) {
            if (!empty($_SERVER[$key])) {
                $ipList = explode(',', $_SERVER[$key]); // puede haber varias IPs separadas por comas
                foreach ($ipList as $ipCandidate) {
                    $ipCandidate = trim($ipCandidate);
                    // Validar que sea una IP pública válida
                    if (filter_var(
                        $ipCandidate,
                        FILTER_VALIDATE_IP,
                        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                    )) {
                        return $ipCandidate;
                    }
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    public function validate_login(){
        $data = [
            'user' => $this->request->getPostGet('user'),
            'password' => $this->request->getPostGet('password'),
        ];
        
        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            // recuperamos el hash del usuario almacenado en base de datos
            $usuario = $this->usuarioModel->_getUsuario($data);

            $ip = $this->getClientIp();
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $estado = 1;
            
            if ($estado == 0) {
                return redirect()->to('/');
            }else{
                
                if (isset($usuario) && $usuario != NULL && password_verify($data['password'], $usuario->password)) {

                    $iduser = $usuario->id;
                    $this->session->version = $this->datosSistemaModel->findAll();
                    

                    //CREO LA SESION NUEVA EN LA TABLA DE SESIONES
                    $session = [
                        'is_logged' => 1,
                        'ip' => $ip,
                        'agent' => $agent,
                        'status' => 1,
                        'idusuario' => $iduser,
                    ];

                    $idsession = $this->sessionModel->insert($session);

                    $sessiondata = [
                        'id' => $usuario->id,
                        'nombre' => $usuario->nombre,
                        'idrol' => $usuario->idrol,
                        'rol' => $usuario->rol,
                        'cedula' => $usuario->cedula,
                        'is_logged' => $session['is_logged'],
                        'administracion' => $usuario->administracion,
                        'facturacion' => $usuario->facturacion,
                        'reportes' => $usuario->reportes,
                        'estado' => $session['status'],
                        'miembro_desde' => $usuario->miembro_desde,
                        'membresia' => $usuario->membresia,
                        'reportes' => $usuario->reportes,
                        'idsession' => $idsession,
                    ];

                    $this->session->set($sessiondata);
                    
                    return redirect()->to('inicio');

                }else{
                    $this->session->setFlashdata('mensaje', $data);
                    //$this->logout();
                    return redirect()->back()->with(
                        'mensaje', 
                        'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos o su usuario ha sido desactivado, contacte con el administrador'
                    );
                }
            }
        }
        
    }

    public function inicio() {
        
        $data = $this->acl();
        
        
        if ($data['is_logged'] == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();
            $data['users'] = $this->usuarioModel->findAll();
            
            $data['title'] = 'Inicio';
            $data['subtitle']='Index';
            $data['main_content'] = 'home/inicio';
            return view('dashboard/index', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function logout(){
        //destruyo la session  y salgo
        $iduser = $this->session->id;
        $user = [
            'logged' => 0,
            'ip' => 0
        ];
        //echo '<pre>'.var_export($user, true).'</pre>';exit;
        if ($iduser) {
            $this->usuarioModel->update($iduser, $user);
        }
        $this->session->destroy();
        return redirect()->to('/');
    }

}
