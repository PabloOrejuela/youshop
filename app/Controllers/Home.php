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

    public function acl() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->id;
        $data['logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['miembro_desde'] = $this->session->created_at;
        
        return $data;
    }


    public function __construct(){

        $this->mes = date('m');
        $this->anio = date('Y');

    }

    public function index(): string {

        $data = $this->acl();
        
        if ($data['logged'] == 1 ) {
            
            $data['session'] = $this->session;

            return redirect()->to('inicio');
        }else{
            $this->logout();
        }
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

            //$usuario = $this->usuarioModel->_getUsuario($data);

            // recuperamos el hash del usuario almacenado en base de datos
            $usuario = $this->usuarioModel->select('usuarios.id as id,nombre,user,telefono,email,password,cedula,idrol,logged,rol,
            facturacion,administracion,reportes,instructor,membresia,usuarios.estado as estado,usuarios.created_at as miembro_desde')
                    ->join('roles','roles.id = usuarios.idrol')
                    ->where('user', $data['user'])
                    ->findAll();
            
            // comprobamos si la contraseña enviada desde el formulario se corresponde con el hash alojado

            $ip = $_SERVER['REMOTE_ADDR'];
            $estado = 1;
            
            if ($estado == 0) {
                return redirect()->to('/');
            }else{
                
                if (isset($usuario) && $usuario != NULL && password_verify($data['password'], $usuario[0]->password)) {

                    //valido el login y pongo el id en sesion  && $usuario->id != 1 
                    if ($usuario[0]->logged == 1) {
                        //Está logueado así que lo deslogueo
                        $user = [
                            'id' => $usuario[0]->id,
                            'logged' => 0,
                            'ip' => 0
                        ];
                        $this->usuarioModel->update($usuario[0]->id, $user);
                    }
                    
                    $sessiondata = [
                        
                        'id' => $usuario[0]->id,
                        'nombre' => $usuario[0]->nombre,
                        'idrol' => $usuario[0]->idrol,
                        'rol' => $usuario[0]->rol,
                        'cedula' => $usuario[0]->cedula,
                        'logged' => $usuario[0]->logged,
                        'administracion' => $usuario[0]->administracion,
                        'facturacion' => $usuario[0]->facturacion,
                        'reportes' => $usuario[0]->reportes,
                        'estado' => $usuario[0]->estado,
                        'miembro_desde' => $usuario[0]->miembro_desde,
                        'membresia' => $usuario[0]->membresia,
                        'reportes' => $usuario[0]->reportes,
                    ];
                    
                   
                    $iduser = $usuario[0]->id;

                    $user = [
                        'logged' => 1,
                        'ip' => $ip
                    ];
                    
                    $this->usuarioModel->update($iduser, $user);
                    
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
        
        if ($data['logged'] == 1) {
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
