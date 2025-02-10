<?php

namespace App\Controllers;

use App\Models\GestionClienteModel;
use App\Models\GestionPedidosModel;
use Dompdf\Options;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;

use Exception;

class SalidasOrdenes extends BaseController
{
  public function OrdenExtrucion()
  {
    //  return view('1_BasePrincipal/saludo.php');
    $session = session();
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
      view('8_SalidasOrdenes/1_Salidas_Bopp_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  //----------------------------------------------------------------------------------------------------------------------
  //selector de pedidos y vista 
  //visualizar datos en la tabla 
  public function DatosSalidasBoppView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoBopp(1);
    $columnas = [
      'id'=>true,
      'nombre_usuario' => true,
      'apellido_usuario' => true,
      'precio_bolsa' => true,
      'material' => true,
      'tipo_trabajo' => true,
      'notas' => true,
      'created_at' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }
  public function ImpresionSalidaBopp()
  {
    $Model = new GestionPedidosModel();
    $request = service('request');
    $id = $request->getGet('id');
    $datoPedido = $Model->obtenerPedidoBoppId($id);
    if (!empty($datoPedido)) {
      $logo = 'imagen/logo.png';
      $logo = file_get_contents($logo);
      $logo64 = base64_encode($logo);
      // Datos del reporte
      $dataReporte = [
        "logo" => $logo64,
        "datoPedido"=>$datoPedido,
      ];
      $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);
      $html = view('5_ImpresionesDocumentos/impresionSalidasBopp', $dataReporte);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // Guardar o descargar el PDF
      return $this->response->setContentType('application/pdf')
        ->setBody($dompdf->output())
        ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
    } else {
      $Model = new GestionPedidosModel();
      $request = service('request');
      $id =$request->getGet('id');
      $datoPedido = $Model->obtenerPedidoBoppId($id);
      if (!empty($datoPedido)) {
        $session = session();
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionSalidaBopp', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


      }


    }
  }
  public function eliminarSalidaBopp()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarSalidaBopp($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }

  /**********************************************************************************************
   *salida tricapa 65x75 
   ***********************************************************************************************/
  public function SalidaTricapa65()
  {
    //  return view('1_BasePrincipal/saludo.php');
    $session = session();
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
      view('8_SalidasOrdenes/2_Salidas_Tricapa_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  
  //visualizar datos en la tabla 
  public function DatosSalidaTricapa65View()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoTricapa(2);
    $columnas = [
      'id'=>true,
      'nombre_usuario' => true,
      'apellido_usuario' => true,
      'precio_bolsa' => true,
      'material' => true,
      'tipo_trabajo' => true,
      'notas' => true,
      'created_at' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }
  public function ImpresionSalidaTricapa65()
  {
    $Model = new GestionPedidosModel();
    $request = service('request');
    $id = $request->getGet('id');
    $datoPedido = $Model->obtenerPedidoTricapaId($id);
    if (!empty($datoPedido)) {
      $logo = 'imagen/logo.png';
      $logo = file_get_contents($logo);
      $logo64 = base64_encode($logo);
      // Datos del reporte
      $dataReporte = [
        "logo" => $logo64,
        "datoPedido"=>$datoPedido,
      ];
      $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);
      $html = view('5_ImpresionesDocumentos/impresionSalidaTricapa', $dataReporte);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // Guardar o descargar el PDF
      return $this->response->setContentType('application/pdf')
        ->setBody($dompdf->output())
        ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
    } else {
      $Model = new GestionPedidosModel();
      $request = service('request');
      $id =$request->getGet('id');
      $datoPedido = $Model->obtenerPedidoExtrucionId($id);
      if (!empty($datoPedido)) {
        $session = session();
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionExtrucion', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


      }


    }
  }

  /***************************************************************************************** *
  *pedido tricapa 67x75
  *******************************************************************************************/

  public function SalidaTricapa67()
  {
    //  return view('1_BasePrincipal/saludo.php');
    $session = session();
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
      view('8_SalidasOrdenes/3_Salidas_Tricapa_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  
  //visualizar datos en la tabla 
  public function DatosPedidosTricapaView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoExtrucion(3);
    $columnas = [
      'id' => true,
      'nombre_usuario' => true,
      'apellido_usuario' => true,
      'precio_bolsa' => true,
      'material' => true,
      'tipo_trabajo' => true,
      'notas' => true,
      'created_at' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }
  public function ImpresionSalidaTricapa()
  {
    $Model = new GestionPedidosModel();
    $request = service('request');
    $id = $request->getGet('id');
    $datoPedido = $Model->obtenerPedidoExtrucionId($id);
    if (!empty($datoPedido)) {
      $logo = 'imagen/logo.png';
      $logo = file_get_contents($logo);
      $logo64 = base64_encode($logo);
      // Datos del reporte
      $dataReporte = [
        "logo" => $logo64,
        "datoPedido"=>$datoPedido,
      ];
      $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);
      $html = view('5_ImpresionesDocumentos/impresionSalidaTricapa', $dataReporte);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // Guardar o descargar el PDF
      return $this->response->setContentType('application/pdf')
        ->setBody($dompdf->output())
        ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
    } else {
      $Model = new GestionPedidosModel();
      $request = service('request');
      $id =$request->getGet('id');
      $datoPedido = $Model->obtenerPedidoExtrucionId($id);
      if (!empty($datoPedido)) {
        $session = session();
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionExtrucion', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


      }


    }
  }
  public function eliminarSalidaTricapa()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }
 

  public function SalidaRefilado()
  {
    //  return view('1_BasePrincipal/saludo.php');
    $session = session();
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
      view('8_SalidasOrdenes/4_Salidas_Refilado_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  //visualizar datos en la tabla 
  public function DatosPedidosRefiladoView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoExtrucion(4);
    $columnas = [
      'id'=>true,
      'nombre_usuario' => true,
      'apellido_usuario' => true,
      'precio_bolsa' => true,
      'material' => true,
      'tipo_trabajo' => true,
      'notas' => true,
      'created_at' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }
  public function ImpresionSalidaRefilado()
  {
    $Model = new GestionPedidosModel();
    $request = service('request');
    $id = $request->getGet('id');
    $datoPedido = $Model->obtenerPedidoExtrucionId($id);
    if (!empty($datoPedido)) {
      $logo = 'imagen/logo.png';
      $logo = file_get_contents($logo);
      $logo64 = base64_encode($logo);
      // Datos del reporte
      $dataReporte = [
        "logo" => $logo64,
        "datoPedido"=>$datoPedido,
      ];
      $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);
      $html = view('5_ImpresionesDocumentos/impresionSalidaRefilado', $dataReporte);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // Guardar o descargar el PDF
      return $this->response->setContentType('application/pdf')
        ->setBody($dompdf->output())
        ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
    } else {
      $Model = new GestionPedidosModel();
      $request = service('request');
      $id =$request->getGet('id');
      $datoPedido = $Model->obtenerPedidoExtrucionId($id);
      if (!empty($datoPedido)) {
        $session = session();
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionExtrucion', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


      }


    }
  }
  public function eliminarSalidaRefilado()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }
 
/*******************************************************************
 * SALIDA LAMINADO
 */
  public function SalidaLaminado()
  {
    //  return view('1_BasePrincipal/saludo.php');
    $session = session();
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
      view('8_SalidasOrdenes/5_Salidas_Laminado_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  //visualizar datos en la tabla 
  public function DatosPedidosLaminadoView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoExtrucion(5);
    $columnas = [
      'id'=>true,
      'nombre_usuario' => true,
      'apellido_usuario' => true,
      'precio_bolsa' => true,
      'material' => true,
      'tipo_trabajo' => true,
      'notas' => true,
      'created_at' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }
  public function ImpresionPedidoLaminado()
  {
    $Model = new GestionPedidosModel();
    $request = service('request');
    $id = $request->getGet('id');
    $datoPedido = $Model->obtenerPedidoExtrucionId($id);
    if (!empty($datoPedido)) {
      $logo = 'imagen/logo.png';
      $logo = file_get_contents($logo);
      $logo64 = base64_encode($logo);
      // Datos del reporte
      $dataReporte = [
        "logo" => $logo64,
        "datoPedido"=>$datoPedido,
      ];
      $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
      $options = new Options();
      $options->set('isRemoteEnabled', true);
      $dompdf = new Dompdf($options);
      $html = view('5_ImpresionesDocumentos/impresionSalidaLaminado', $dataReporte);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // Guardar o descargar el PDF
      return $this->response->setContentType('application/pdf')
        ->setBody($dompdf->output())
        ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
    } else {
      $Model = new GestionPedidosModel();
      $request = service('request');
      $id =$request->getGet('id');
      $datoPedido = $Model->obtenerPedidoExtrucionId($id);
      if (!empty($datoPedido)) {
        $session = session();
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionExtrucion', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


      }


    }
  }
  public function eliminarSalidaLaminado()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }
  


  //datatables tools
  public function datatables($datos, $columnas)
  {
      require_once(FCPATH . 'recursos/librerias/datatables/server.php');
  
      $columnsDefault = $columnas;
  
      if (isset($_REQUEST['columnsDef']) && is_array($_REQUEST['columnsDef'])) {
          $columnsDefault = [];
          foreach ($_REQUEST['columnsDef'] as $field) {
              $columnsDefault[$field] = true;
          }
      }
  
      $alldata = json_decode($datos, true);
      $data = [];
      $subtotales = [];
      $total = 0;
  
      foreach ($alldata as $d) {
          $filtered_data = filterArray($d, $columnsDefault);
          $data[] = $filtered_data;
  
          foreach ($columnas as $columna) {
              if (isset($filtered_data[$columna]) && is_numeric($filtered_data[$columna])) {
                  if (!isset($subtotales[$columna])) {
                      $subtotales[$columna] = 0;
                  }
                  $subtotales[$columna] += $filtered_data[$columna];
                  $total += $filtered_data[$columna]; // Suma al total general dentro del bucle
              }
          }
      }
  
      $totalRecords = $totalDisplay = count($data);
  
      if (isset($_REQUEST['search'])) {
          $data = filterKeyword($data, $_REQUEST['search']);
          $totalDisplay = count($data);
      }
  
      if (isset($_REQUEST['columns']) && is_array($_REQUEST['columns'])) {
          foreach ($_REQUEST['columns'] as $column) {
              if (isset($column['search'])) {
                  $data = filterKeyword($data, $column['search'], $column['data']);
                  $totalDisplay = count($data);
              }
          }
      }
  
       // Recalcular subtotales y total DESPUÉS de filtrar
      $subtotales_filtrados = [];
      $total_filtrado = 0;
      foreach ($data as $d) {
          foreach ($columnas as $columna) {
              if (isset($d[$columna]) && is_numeric($d[$columna])) {
                  if (!isset($subtotales_filtrados[$columna])) {
                      $subtotales_filtrados[$columna] = 0;
                  }
                  $subtotales_filtrados[$columna] += $d[$columna];
                  $total_filtrado += $d[$columna];
              }
          }
      }
  
  
      if (isset($_REQUEST['order'][0]['column']) && $_REQUEST['order'][0]['dir']) {
          $column = $_REQUEST['order'][0]['column'];
          $dir = $_REQUEST['order'][0]['dir'];
          usort($data, function ($a, $b) use ($column, $dir) {
              $a = array_slice($a, $column, 1);
              $b = array_slice($b, $column, 1);
              $a = array_pop($a);
              $b = array_pop($b);
  
              if ($dir === 'asc') {
                  return $a > $b ? true : false;
              }
  
              return $a < $b ? true : false;
          });
      }
  
      if (isset($_REQUEST['length'])) {
          $data = array_splice($data, $_REQUEST['start'], $_REQUEST['length']);
      }
  
      if (isset($_REQUEST['array_values']) && $_REQUEST['array_values']) {
          $tmp = $data;
          $data = [];
          foreach ($tmp as $d) {
              $data[] = array_values($d);
          }
      }
  
      $result = [
          'recordsTotal' => $totalRecords,
          'recordsFiltered' => $totalDisplay,
          'data' => $data,
          'subtotales' => $subtotales_filtrados, // Usar subtotales filtrados
          'total' => $total_filtrado,  // Usar el total filtrado
      ];
  
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *'); // ¡Cuidado con esto en producción!
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
      echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }

}

