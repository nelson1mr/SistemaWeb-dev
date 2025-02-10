<?php

namespace App\Controllers;

use App\Models\GestionClienteModel;
use App\Models\GestionPedidosModel;
use Dompdf\Options;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;

use Exception;

class OrdeneController extends BaseController
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
      view('4_Ordenes/1_Orden_Extrucion_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  //----------------------------------------------------------------------------------------------------------------------
  //selector de pedidos y vista 
  //visualizar datos en la tabla 
  public function DatosPedidosExtruccionView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoExtrucion(1);
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
  public function ImpresionPedidoExtrucion()
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
      $html = view('5_ImpresionesDocumentos/impresionExtrucion', $dataReporte);
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
  public function eliminarOrdenExtrucion()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }

  /**********************************************************************************************
   *pedido bopp 
   ***********************************************************************************************/
  public function OrdenBopp()
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
      view('4_Ordenes/2_Orden_Bopp_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  
  //visualizar datos en la tabla 
  public function DatosPedidosBoopView()
  {

    $pedidoModel = new GestionPedidosModel();
    $datos = $pedidoModel->obtenerPedidoExtrucion(2);
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
  public function ImpresionPedidoBoop()
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
      $html = view('5_ImpresionesDocumentos/impresionBopp', $dataReporte);
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
  *pedido tricapa
  *******************************************************************************************/

  public function OrdenTricapa()
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
      view('4_Ordenes/3_Orden_Tricapa_page_view.php') .
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
  public function ImpresionPedidoTrica()
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
      $html = view('5_ImpresionesDocumentos/impresionTricapa', $dataReporte);
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
  public function eliminarOrdenTrica()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }
 

  public function OrdenRefilado()
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
      view('4_Ordenes/4_Orden_Refilado_page_view.php') .
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
  public function ImpresionPedidoRefilado()
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
      $html = view('5_ImpresionesDocumentos/impresionRefilado', $dataReporte);
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
  public function eliminarOrdenRefilado()
  {
      $request = service('request');
      $id = $request->getPost('id');
      $padreModel = new GestionPedidosModel();
      $padreModel->eliminarOrdenExtrucion($id);
      $response = array('success' => true, 'message' => 'Eliminado con exito');
      return $this->response->setJSON($response);
  }
 

  public function OrdenLaminado()
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
      view('4_Ordenes/5_Orden_Laminado_page_view.php') .
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
      $html = view('5_ImpresionesDocumentos/impresionLaminado', $dataReporte);
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
  public function eliminarOrdenLaminado()
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
    //echo base_url();
    require_once(FCPATH . 'recursos/librerias/datatables/server.php');

    $columnsDefault = $columnas;

    if (isset($_REQUEST['columnsDef']) && is_array($_REQUEST['columnsDef'])) {
      $columnsDefault = [];
      foreach ($_REQUEST['columnsDef'] as $field) {
        $columnsDefault[$field] = true;
      }
    }

    // get all raw data
    $alldata = json_decode($datos, true);
    //var_dump ($alldata);
    $data = [];
    // internal use; filter selected columns only from raw data
    foreach ($alldata as $d) {
      $data[] = filterArray($d, $columnsDefault);
      //echo $d;
    }

    //var_dump($data);
    // count data
    $totalRecords = $totalDisplay = count($data);
    // filter by general search keyword
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
    // sort
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
    // pagination length
    if (isset($_REQUEST['length'])) {
      $data = array_splice($data, $_REQUEST['start'], $_REQUEST['length']);
    }
    // return array values only without the keys
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
    ];

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }
}

