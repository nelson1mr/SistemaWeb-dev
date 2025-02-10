<?php

namespace App\Controllers;

use App\Models\ScrafModel;

use App\Models\GestionClienteModel;
use App\Models\GestionPedidosModel;
use Dompdf\Options;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;

use Exception;


use CodeIgniter\HTTP\ResponseInterface;

class RegistroScraf extends BaseController
{
    public function RegistroScraf()
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
            view('7_Registro_Scraf/1_Scraf.php') .
            view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
            view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
            view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
            view('2_Cuerpo/1_Esquema/10_end_page_view.php')
        ;
    }


    public function guardarScrafEstrucion()
    {
        $scrafModel = new ScrafModel();
        $valor=1;
        // Obtener los datos enviados mediante AJAX
        $data = $this->request->getJSON();

        // Verificar si se recibieron datos válidos
        if (!$data || !isset($data->filas) || empty($data->filas)) {
           return $this->response->setJSON(['success' => false, 'message' => 'No se han recibido datos válidos.']);
        }

        // Capturar el ID
        $id = $data->id ?? null;
        if (!$id) {
           return $this->response->setJSON(['success' => false, 'message' => 'El ID es obligatorio.']);
        }


        // Procesar cada fila
        foreach ($data->filas as $fila) {
            // Sumar los valores de las columnas
            $suma =
                floatval($fila->columna1) +
                floatval($fila->columna2) +
                floatval($fila->columna3) +
                floatval($fila->columna4) +
                floatval($fila->columna5) +
                floatval($fila->columna6) +
                ifloatval($fila->columna7) +
                ifloatval($fila->columna8);
            $suma =
                floatval($filasubtotal->columna1) +
                floatval($filasubtotal->columna2) +
                floatval($filasubtotal->columna3) +
                floatval($filasubtotal->columna4) +
                floatval($filasubtotal->columna5) +
                floatval($filasubtotal->columna6) +
                floatval($filasubtotal->columna7) +
                floatval($filasubtotal->columna8);

            // Preparar los datos para la base de datos
            $registro = [
                'id_pedido' => $id,
                'item' => $fila->item,
                'columna1' => floatval($fila->columna1),
                'columna2' => floatval($fila->columna2),
                'columna3' => floatval($fila->columna3),
                'columna4' => floatval($fila->columna4),
                'columna5' => floatval($fila->columna5),
                'columna6' => floatval($fila->columna6),
                'columna7' => floatval($fila->columna7),
                'columna8' => floatval($fila->columna8),
                'suma' => $suma,
            ];

            $registro = [
                'id_pedido' => $id,
                'item' => $fila->item,
                'columna1' => floatval($filasubtotal->columna1),
                'columna2' => floatval($filasubtotal->columna2),
                'columna3' => floatval($filasubtotal->columna3),
                'columna4' => floatval($filasubtotal->columna4),
                'columna5' => floatval($filasubtotal->columna5),
                'columna6' => floatval($filasubtotal->columna6),
                'columna7' => floatval($filasubtotal->columna7),
                'columna8' => floatval($filasubtotal->columna8),
                'suma' => $suma,
            ];

            // Verificar si ya existe un registro con el mismo id_pedido y item
            $existingRecord = $scrafModel->where('id_pedido', $registro['id_pedido'])
                ->where('item', $registro['item'])
                ->first();

            if ($existingRecord) {
                // Actualizar los datos del registro existente
                $scrafModel->update($existingRecord['id'], $registro);
             
    
            } else {
                // Insertar el nuevo registro
                $scrafModel->insert($registro);
        
            }
        }
            return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente.']);
          // return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente.']);
    }
    
    public function imprimirScraf()
    {
      $Model = new ScrafModel();
      $datoPedido = $Model->getPedidoDetails();
      if (!empty($datoPedido)) {

       // echo '<pre>'; print_r( $datoPedido); echo '</pre>';return;
        $logo = 'imagen/logo.png';
        $logo = file_get_contents($logo);
        $logo64 = base64_encode($logo);
        // Datos del reporte
        $dataReporte = [
          "logo" => $logo64,
          "datos"=>$datoPedido,
        ];
        $filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $html = view('5_ImpresionesDocumentos/impresionScraf', $dataReporte);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // Guardar o descargar el PDF
        return $this->response->setContentType('application/pdf')
          ->setBody($dompdf->output())
          ->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
      } 
      
      
      
      else {
       
        if (!empty($datoPedido)) {
         // $session = session();
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

}

