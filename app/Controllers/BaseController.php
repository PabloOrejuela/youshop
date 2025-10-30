<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\ArticuloModel;
use App\Models\CategoriaModel;
use App\Models\CierreCajaModel;
use App\Models\ClienteModel;
use App\Models\DatosEmpresaModel;
use App\Models\DatosSistemaModel;
use App\Models\DetalleVentaModel;
use App\Models\PlanCuentaModel;
use App\Models\ProveedorModel;
use App\Models\TipoDocumentoModel;
use App\Models\UsuarioModel;
use App\Models\VentaModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['form','url','file', 'session'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->db = \Config\Database::connect();
        $this->articuloModel = new ArticuloModel($this->db);
        $this->categoriaModel = new CategoriaModel($this->db);
        $this->cierreCajaModel = new CierreCajaModel($this->db);
        $this->clienteModel = new ClienteModel($this->db);
        $this->datosEmpresaModel = new DatosEmpresaModel($this->db);
        $this->datosSistemaModel = new DatosSistemaModel($this->db);
        $this->planCuentaModel = new PlanCuentaModel($this->db);
        $this->proveedorModel = new ProveedorModel($this->db);
        $this->tipoDocumentoModel = new TipoDocumentoModel($this->db);
        $this->usuarioModel = new UsuarioModel($this->db);
        $this->ventaModel = new VentaModel($this->db);
        $this->detalleVentaModel = new DetalleVentaModel($this->db);

        // E.g.: $this->session = service('session');
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
        $this->image = \Config\Services::image();
    }
}
