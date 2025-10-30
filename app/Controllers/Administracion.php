<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\Shared\Date as PhpExcelDate;

class Administracion extends BaseController {

    private $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    public function __construct(){

        $this->mes = date('m');
        $this->anio = date('Y');
        helper('acl_helper');

    }

    public function acl() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->id;
        $data['logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['miembro_desde'] = $this->session->created_at;
        
        return $data;
    }

    public function index() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 ) {
            
            $data['session'] = $this->session;

            return redirect()->to('administracion');
        }else{
            $this->logout();
        }
    }

    public function admin_inicio() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Inicio';
            $data['main_content'] = 'administracion/inicio';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function datosEmpresa() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();
            $data['empresa'] = $this->datosEmpresaModel->first();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Datos de la empresa';
            $data['main_content'] = 'administracion/frm_datos_empresa';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function frmImportarDatosVentas() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();
            $data['empresa'] = $this->datosEmpresaModel->first();

            
            $data['title'] = 'Administración';
            $data['subtitle']='Datos de la empresa';
            $data['main_content'] = 'administracion/frm_importar_datos_ventas';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function gridClientes() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['clientes'] = $this->clienteModel
                            ->select("id,nombres, num_documento,direccion,email,telefono,idtipo_documento")
                            ->orderBy('nombres', 'asc')->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Clientes';
            $data['main_content'] = 'administracion/grid_clientes';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function listaUsuarios() {
        
        $data = $this->acl();
        
        if ($data['logged'] == 1 && $this->session->administracion == 1) {
            //  echo '<pre>'.var_export('inicio', true).'</pre>';exit;

            $data['session'] = $this->session;
            $data['sistema'] = $this->datosSistemaModel->findAll();

            $data['tipos'] = $this->tipoDocumentoModel->findAll();

            $data['usuarios'] = $this->usuarioModel
                            ->select("id,nombre,cedula,direccion,email,telefono,idtipo_documento,estado")
                            ->orderBy('nombre', 'asc')->findAll();
            
            $data['title'] = 'Administración';
            $data['subtitle']='Usuarios';
            $data['main_content'] = 'administracion/grid_usuarios';
            return view('dashboard/index_admin', $data);
        }else{
            $this->session->setFlashdata('mensaje', $data);
            return redirect()->back()->with(
                'mensaje', 
                'Hubo un problema, no puede ingresar al sistema, puede deberse a: Usuario / contraseña incorrectos, su usuario ha sido desactivado o no posee los permisos necesarios para ingresar, contacte con el administrador'
            );  
        }
    }

    public function importarDatosVentas(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('excelFile');

        //Verifico que sea válido
        if (!$file->isValid()) {
            //throw new RuntimeException($file->getErrorString());
            return redirect()->to('frm-importar-datos-ventas');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Aseguro que la ruta termine con slash y exista
            $ruta = rtrim($ruta, '/').'/' ;
            if (!is_dir($ruta)) {
                mkdir($ruta, 0755, true);
            }

            // Si ya existe un archivo con el mismo nombre, lo elimino para sobrescribir
            $targetPath = $ruta . $nameFile;
            if (file_exists($targetPath)) {
                @unlink($targetPath);
            }

            //Muevo el archivo del temporal a la carpeta
            $file->move($ruta, $nameFile);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                
                //Creo qel reader
                $reader = new XlsxReader();

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                // Creamos un arreglo para los registros omitidos
                $omitidos = [];

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(3) as $row) {

                    $i = $row->getRowIndex();

                    // Si la fila está vacía, detenemos la lectura
                    if ($this->rowIsEmpty($sheet, $i, ['B','C','D','K'])) {
                        break;
                    }

                    $cellFecha = $sheet->getCell('B'.$i)->getValue();

                    // Si la celda viene como número de Excel, convertir a fecha legible
                    if (is_numeric($cellFecha)) {
                        $fechaObj = PhpExcelDate::excelToDateTimeObject((float) $cellFecha);
                        $fecha = $fechaObj->format('Y-m-d H:i:s'); 
                    } else {
                        // si ya es texto, limpiar
                        $fecha = trim((string) $cellFecha);
                    }

                    $datosExcel = [
                        'fila' => $i,
                        'fecha' => $fecha,
                        'representante' => strtoupper(trim((string) $sheet->getCell('C'.$i)->getValue())),
                        'cedula' => trim((string) $sheet->getCell('D'.$i)->getValue()),
                        'correo' => trim((string) $sheet->getCell('E'.$i)->getValue()),
                        'celular' => trim((string) $sheet->getCell('F'.$i)->getValue()),
                        'sector' => strtoupper(trim((string) $sheet->getCell('G'.$i)->getValue())),
                        'valor' => trim((string) $sheet->getCell('H'.$i)->getValue()),
                        'valor_neto' => trim((string) $sheet->getCell('I'.$i)->getValue()),
                        'iva' => trim((string) $sheet->getCell('J'.$i)->getValue()),
                        'fact_num' => trim((string) $sheet->getCell('K'.$i)->getValue()),
                        'tipo_pago' => trim((string) $sheet->getCell('L'.$i)->getValue()),
                        'cod_producto' => trim((string) $sheet->getCell('N'.$i)->getValue()),
                    ];

                    // Normalizo datos clave y verifico estos datos
                    $factNum = trim((string) ($datosExcel['fact_num'] ?? ''));
                    $representante = strtoupper(trim((string) ($datosExcel['representante'] ?? '')));
                    $representante = str_replace('Ú', 'U', $representante);
                    $representante = preg_replace('/\s+/', ' ', $representante);
                    $cedulaClean = preg_replace('/\D/', '', (string) ($datosExcel['cedula'] ?? ''));

                    // Verifico si el registro debe omitirse
                    $motivoOmitido = '';
                    if ($factNum === '') {
                        $motivoOmitido = 'Factura vacía';
                    } elseif ($cedulaClean === '9999999999') {
                        $motivoOmitido = 'Cédula genérica';
                    } elseif (in_array($representante, ['CONSUMIDOR FINAL', 'CONDUMIDOR FINAL'], true)) {
                        $motivoOmitido = 'Consumidor final';
                    }

                    if ($motivoOmitido !== '') {
                        // Guardo en arreglo para reporte
                        $omitidos[] = [
                            'fila' => $i,
                            'fact_num' => $factNum,
                            'representante' => $representante,
                            'cedula' => $cedulaClean,
                            'motivo' => $motivoOmitido
                        ];
                        continue; // salto el registro
                    }

                    if ($factNum === '' || $representante === 'CONSUMIDOR FINAL' || $cedulaClean === '9999999999') {
                        continue;
                    }else{
                        //Buscar si existe el cliente y si no existe registrarlo
                        $cliente = $this->clienteModel->where('num_documento', $datosExcel['cedula'])->first();
                        $numFactura = $this->separaNumFactura($datosExcel['fact_num']);

                        // Determinar tipo de documento basándonos en la longitud (solo dígitos)
                        $numeroDocumento = preg_replace('/\D/', '', $datosExcel['cedula']);
                        $len = strlen($numeroDocumento);

                        if ($len > 10) {
                            $tipo_documento = 1;
                        } elseif ($len === 10) {
                            $tipo_documento = 2;
                        } else {
                            $tipo_documento = 5;
                        }

                        $cadenaNombres = $datosExcel['representante'];

                        // Dividir la cadena por "/"
                        $partes = explode('/', $cadenaNombres);

                        // Tomar el primer elemento y eliminar espacios extra
                        $nombre = trim($partes[0]);

                        if (!$cliente) {
                            $nuevoCliente = [
                                'nombres' => $nombre,
                                'num_documento' => $cedulaClean,
                                'direccion' => $datosExcel['sector'],
                                'telefono' => $datosExcel['celular'],
                                'email' => $datosExcel['correo'],
                                'idtipo_documento' => $tipo_documento
                            ];
                            //Registro el cliente que no está registrado
                            $this->clienteModel->insert($nuevoCliente);
                            $idcliente = (int) $this->clienteModel->getInsertID();
                            
                        }else{
                            //Obtengo el id del cliente
                            $row = $this->clienteModel->select('id')->where('num_documento', $cedulaClean)->first();
                            $idcliente = (int) $row->id;
                        }
                        
                        //Obtengo tipo de pago y tipo de producto
                        $tipo_pago = $this->devuelveTipoPago($datosExcel['tipo_pago']);
                        $idarticulo = $this->devuelveIdProducto($datosExcel['cod_producto']);
                        
                        
                        //Con el id de el cliente registrar la factura
                        $factura = [
                            'idcliente' => $idcliente,
                            'idusuario' => $this->session->id,
                            'idtipo_comprobante' => 1,
                            'serie' => $numFactura['serie'],
                            'subserie' => $numFactura['subserie'],
                            'num_comprobante' => $numFactura['num_factura'],
                            'codigo_numerico' => '00',
                            'fecha' => $datosExcel['fecha'],
                            'iva' => 15,
                            'impuesto' => number_format((floatval($datosExcel['valor'])/1.15)*0.15, 2),
                            'valor_neto' => number_format((floatval($datosExcel['valor'])/1.15), 2),
                            'total' => number_format((floatval($datosExcel['valor'])), 2),
                            'estado' => 1,
                            'idformaPago' => $tipo_pago,
                            'idempresa' => 1,
                            'clave_acceso' => '',
                            'auth_sri' => '',
                            'enviado' => 'NO',

                        ];

                        //echo '<pre>'.var_export($factura, true).'</pre>';
                        $idfactura = $this->ventaModel->insert($factura);

                        //Con el id de la factura registrar el detalle el cual sería una sola línea

                        $detalle = [
                            'idventa' => $idfactura,
                            'idarticulo' => $idarticulo,
                            'cantidad' => 1,
                            'precio' => $factura['total'],
                            'descuento' => '0.00'
                        ];

                        $this->detalleVentaModel->insert($detalle);
                    }
                }

                if (!empty($omitidos)) {
                    $logFile = WRITEPATH . 'logs/registros_omitidos_' . date('Ymd_His') . '.txt';

                    // Encabezado del log
                    $contenido  = "=============================================\n";
                    $contenido .= "        LOG DE REGISTROS OMITIDOS\n";
                    $contenido .= "=============================================\n";
                    $contenido .= "Fecha de generación: " . date('Y-m-d H:i:s') . "\n";
                    $contenido .= "Cantidad total de registros omitidos: " . count($omitidos) . "\n";
                    $contenido .= "=============================================\n\n";

                    // Listado de registros omitidos
                    foreach ($omitidos as $i => $registro) {
                        $contenido .= ($i + 1) . ". " . json_encode($registro, JSON_UNESCAPED_UNICODE) . "\n";
                    }

                    // Escribir archivo (una sola vez, al final)
                    file_put_contents($logFile, $contenido);
                }
                $data['mensaje'] = 'Los datos se han cargado revise el archivo de logs para ver si ha habido alguna novedad';
                // //return redirect()->to('frm-importar-datos-ventas');
                $this->session->setFlashdata('mensaje', $data);
                
                return redirect()->back()->with('mensaje', 'Los datos se han cargado revise el archivo de logs para ver si ha habido alguna novedad');
            }
        } 
    }

    private function devuelveTipoPago($tipo_pago){
        $tipo = 9;
        if ($tipo_pago == "EFCTIVO") {
            $tipo = 1;
        }else if($tipo_pago == "TRANSFERENCIA"){
            $tipo = 7;
        }else if($tipo_pago == "TARJETA"){
            $tipo = 3;
        }
        return $tipo;
    }

    private function devuelveIdProducto($producto){
        $idarticulo = 28; //PRIMERA CLASE (GRATIS)
        if ($producto == "CLASE FUN,CAL,TRX") {
            $idarticulo = 31;
        }
        else if($producto == "PRIMERA CLASE (GRATIS)"){
            $idarticulo = 29;
        }
        else if($producto == "1 CLASE"){
            $idarticulo = 4;
        }
        else if($producto == "1 PASE DIARIO"){
            $idarticulo = 25;
        }
        else if($producto == "2 PASE DIARIO"){
            $idarticulo = 4;
        }
        return $idarticulo;
    }

    private function separaNumFactura($fact_num){
        $array = null;
        $numFactura = $fact_num;
        // Validamos el formato: 3 dígitos - 3 dígitos - 9 dígitos
        if (preg_match('/^(\d{3})-(\d{3})-(\d{9})$/', $numFactura, $matches)) {
            $array['serie'] = $matches[1];
            $array['subserie'] = $matches[2];
            $array['num_factura'] = $matches[3];

            
        }else{
            $array['serie'] = '';
            $array['subserie'] = '';
            $array['num_factura'] = '';
        }
        return $array;
    }

    private function rowIsEmpty($sheet, int $rowIndex, array $columns): bool {
        foreach ($columns as $col) {
            $val = trim((string) $sheet->getCell($col.$rowIndex)->getValue());
            if ($val !== '') {
                return false;
            }
        }
        return true;
    }

}
