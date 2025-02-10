<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//routas para login
$routes->get('/', 'LoginController::indexLogin');
$routes->post('/lca', 'LoginController::acceso');

//skip login
$routes->get('/skip-login', 'Auth::login');

//-----------------------------------------------------------------------------------
//routas de Usuario
$routes->get('/cpcc', 'UsuarioController::Usuario');
//mostrar clientes en datatable
$routes->get('/gucdav', 'UsuarioController::datosUsuarioView');
//insertar clientes a la base de datos
$routes->post('/cpcnc', 'UsuarioController::NuevoUsuario');
//extraer datos clientes por id a la base de datos
$routes->post('/cpcecv', 'UsuarioController::ExtracionUsuarioView');
//eliminar clientes a la base de datos
$routes->post('/cpcec', 'UsuarioController::ElimanarUsuario');
//actualizar clientes a la base de datos
$routes->post('/cpcac', 'UsuarioController::ActualizarUsuario');
//--------------------------------------------------------------------------------------
// registro de pedidos
$routes->get('/rpcrp', 'RegistroPedidosController::RegistroPedido');
$routes->post('/rpcap', 'RegistroPedidosController::agregarPedidos');
//-------------------------------------------------------------------------------------
//routas de Ordenes
$routes->get('/ocoe', 'OrdeneController::OrdenExtrucion');
$routes->get('/ocdpe', 'OrdeneController::DatosPedidosExtruccionView');
$routes->get('/ocdpe', 'OrdeneController::DatosPedidosExtruccionView');
$routes->get('/ocdipe', 'OrdeneController::ImpresionPedidoExtrucion');
$routes->post('/oceoe', 'OrdeneController::eliminarOrdenExtrucion');



$routes->get('/ocob', 'OrdeneController::OrdenBopp');
$routes->get('/ocdpbv', 'OrdeneController::DatosPedidosBoopView');
$routes->get('/ocipb', 'OrdeneController::ImpresionPedidoBoop');


$routes->get('/ocot', 'OrdeneController::OrdenTricapa');
$routes->get('/ocdptv', 'OrdeneController::DatosPedidosTricapaView');
$routes->get('/ocipt', 'OrdeneController::ImpresionPedidoTrica');


$routes->get('/ocor', 'OrdeneController::OrdenRefilado');
$routes->get('/ocdprv', 'OrdeneController::DatosPedidosRefiladoView');
$routes->get('/ocipr', 'OrdeneController::ImpresionPedidoRefilado');


$routes->get('/ocol', 'OrdeneController::OrdenLaminado');
$routes->get('/ocdplv', 'OrdeneController::DatosPedidosLaminadoView');
$routes->get('/ocipl', 'OrdeneController::ImpresionPedidoLaminado');

//-------------------------------------------------------------------------------------
//registro Scraf
$routes->get('/rsrs', 'RegistroScraf::RegistroScraf');
$routes->get('/rsis', 'RegistroScraf::imprimirScraf');
$routes->post('/rsg', 'RegistroScraf::guardarScrafEstrucion');

//-------------------------------------------------------------------------------------
//salidas ordenes
$routes->get('/ocob', 'SalidasOrdenes::SalidaBopp');
$routes->get('/ocdpbv', 'SalidasOrdenes::DatosSalidasBoppView');
$routes->get('/ocipb', 'SalidasOrdenes::ImpresionSalidaBopp');

$routes->get('/ocot', 'SalidasOrdenes::SalidaTricapa65');
$routes->get('/ocdptv', 'SalidasOrdenes::DatosSalidasTricapaView');
$routes->get('/ocipt', 'SalidasOrdenes::ImpresionSalidaTricapa');


$routes->get('/ocor', 'SalidasOrdenes::SalidaTricapa67');
$routes->get('/ocdprv', 'SalidasOrdenes::DatosSalidasTricapaView');
$routes->get('/ocipr', 'SalidasOrdenes::ImpresionSalidaTricapa');

$routes->get('/ocor', 'SalidasOrdenes::OrdenRefilado');
$routes->get('/ocdprv', 'SalidasOrdenes::DatosSalidasRefiladoView');
$routes->get('/ocipr', 'SalidasOrdenes::ImpresionSalidaRefilado');


$routes->get('/ocol', 'SalidasOrdenes::SalidaLaminado');
$routes->get('/ocdplv', 'SalidasOrdenes::DatosSalidassLaminadoView');
$routes->get('/ocipl', 'SalidasOrdenes::ImpresionSalidaLaminado');

//-------------------------------------------------------------------------------------
//routas de Impresiones de Documetos
$routes->get('/lcld', 'ImpresionesController::ImpresionesDocumentos');

//------------------------------------------------------------------------------------
//crear usuario
//routas de Perfil
$routes->get('/cuccu', 'CrearUsuarioController::vistaPerfil');
$routes->get('/cucau', 'CrearUsuarioController::administradorPerfil');
$routes->get('/cucdpv', 'CrearUsuarioController::DatosPerfilView');
$routes->post('/cucap', 'CrearUsuarioController::agregarPerfil');
$routes->post('/cucel', 'CrearUsuarioController::ElimanarPerfil');
//-------------------------------------------------------------------------------------
//routas cerraras sesion
$routes->get('/lcl', 'LoginController::logout');