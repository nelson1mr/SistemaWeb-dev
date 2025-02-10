<?php

namespace App\Controllers;

use App\Models\GestionPedidosModel;

class RegistroPedidosController extends BaseController
{
  public function RegistroPedido()
  {
    //  return view('1_BasePrincipal/saludo.php');
    // Obtener los datos de sesión
    $session = session();
    // Crear el arreglo con los datos de sesión que deseas pasar a la vista
    $data = [

      'foto' => $session->get('foto'),
      'nombre' => $session->get('nombre'),
      'apellido' => $session->get('apellido'),
      'genero' => $session->get('genero'),
      'correo' => $session->get('correo'),
      'direccion' => $session->get('direccion'),
      'telefono' => $session->get('telefono'),
      'rol' => $session->get('rol'),
    ];
    return
      view('2_Cuerpo/1_Esquema/1_begin_page_view.php') .
      view('2_Cuerpo/1_Esquema/2_head_page_view.php') .
      view('2_Cuerpo/1_Esquema/3_theme_page_view.php') .
      view('2_Cuerpo/1_Esquema/4_header_page_view.php', $data) .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('6_pedido/1_registroPedidos_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  public function agregarPedidos()
  {
    try {
      $request = service('request');
      $session = session();

      $request = \Config\Services::request();

      // Obtener datos enviados por FormData
      $data = [
        'usuario_id' => $session->get('id'),
        'mes' => $request->getPost('mes'),
        'semana' => $request->getPost('semana'),
        'op' => $request->getPost('op'),
        'nombre_cliente' => $request->getPost('nombreCliente'),
        'peso' => $request->getPost('peso'),
        'maquina_impresion' => $request->getPost('maquinaImpresion'),
        'medida_bolsa' => $request->getPost('medidaBolsa'),
        'precio_bolsa' => $request->getPost('precioBolsa'),
        'impresion' => $request->getPost('impresion'),
        'material' => $request->getPost('material'),
        'maquina_extrucion' => $request->getPost('maquinaExtrucion'),
        'medida_extrucion' => $request->getPost('medidaExtrucion'),
        'material1_impresion' => $request->getPost('material1Impresion'),
        'material2_laminado' => $request->getPost('material2Laminado'),
        'material3_laminado' => $request->getPost('material3Laminado'),
        'notas' => $request->getPost('notas'),
        'tipo_pedido' => $request->getPost('TipoPedido'),
        'estado' => 1, // Asegúrate de que el valor sea correcto para el campo `estado`
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ];

      // Guardar datos en el modelo
      $pedidoModel = new GestionPedidosModel();
      $pedidoModel->insertar_Pedido($data);

      return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    } catch (\Exception $e) {
      log_message('error', 'Error en agregarPedido: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Error al guardar los datos: ' . $e->getMessage()]);
    }
    if($pedidoModel ->insert($data)===false){
      /* $fails = implode("<br>, $pedidoModel->errors());
      $fails = array('falls'->$falls);*/
      var_dump($pedidoModel ->errors());
    };
    $pedidos = $pedidoModel ->findAll();
    $pedidos = array('pedidos'=>$pedidos);
    echo view('structure/header');
    echo view('structure/body', $pedidos);
  }
  public function ordeneController(){
    echo view('structure/header');
    echo view('structure/ordeneController');
  
  }
  

}

