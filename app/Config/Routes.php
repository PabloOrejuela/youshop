<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('validate_login', 'Home::validate_login');
$routes->get('inicio', 'Home::inicio');
$routes->get('logout', 'Home::logout');

//ADMINISTRACION
$routes->get('admin', 'Administracion::index');
$routes->get('administracion', 'Administracion::admin_inicio');
$routes->get('datos-empresa', 'Administracion::datosEmpresa');
$routes->get('clientes', 'Administracion::gridClientes');
$routes->get('frm-importar-datos-ventas', 'Administracion::frmImportarDatosVentas');
$routes->post('importar-datos-ventas', 'Administracion::importarDatosVentas');
$routes->get('lista-usuarios', 'Administracion::listaUsuarios');

//ARTICULOS
$routes->get('productos', 'Productos::index');
$routes->get('registrar-nuevo-articulo', 'Articulos::registrarNuevoArticulo');

//CAJAS
$routes->get('cajas', 'Cajas::cajas');
$routes->get('cierres-caja', 'Cajas::gridCierresCaja');
$routes->get('nuevo-cierre-caja', 'CierresCaja::nuevoCierreCaja');

//CATEGORIAS
$routes->get('categorias', 'Categorias::index');
$routes->get('registrar-nueva-categoria', 'Categorias::registrarNuevaCategoria');

//COMPRAS
$routes->get('grid-proveedores', 'Proveedores::gridProveedores');

//CONTABILIDAD
$routes->get('plan-ctas', 'Contabilidad::planCuentas');

//MEMBRESIAS
$routes->get('miembros', 'Membresias::index');
$routes->get('membresias', 'Membresias::membresias_inicio');

//REPORTES
$routes->get('reporte-cierres-caja', 'Reportes::reporteCierresCaja');

//VENTAS
$routes->get('ventas', 'Ventas::ventas');

