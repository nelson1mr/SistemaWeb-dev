<?php

namespace App\Controllers;

use App\Models\GestionUsuarioModel;

class UsuarioController extends BaseController
{
  public function Usuario()
  {
    // Obtener los datos de sesión
    $session = session();
    // Crear el arreglo con los datos de sesión que deseas pasar a la vista
    $data = [
        'foto'    => $session->get('foto'),
        'nombre'    => $session->get('nombre'),
        'apellido'    => $session->get('apellido'),
        'genero'    => $session->get('genero'),
        'correo'    => $session->get('correo'),
        'direccion'    => $session->get('direccion'),
        'telefono'  => $session->get('telefono'),
        'rol'    => $session->get('rol'),
    ];

    return
      view('2_Cuerpo/1_Esquema/1_begin_page_view.php') .
      view('2_Cuerpo/1_Esquema/2_head_page_view.php') .
      view('2_Cuerpo/1_Esquema/3_theme_page_view.php') .
      view('2_Cuerpo/1_Esquema/4_header_page_view.php',$data) .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('3_Usuario/1_Usuario_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
    ;
  }
  //vista de datos
  public function datosUsuarioView()
  {
    $UsuarioModel = new GestionUsuarioModel();
    $datos = $UsuarioModel->where('estado', 1)->findAll();
    ;
    $columnas = [
      'id' => true,
      'nombre' => true,
      'apellido' => true,
      'correo' => true,
      'cedula_identidad' => true,
      'telefono' => true,
      'direccion' => true,
      'genero' => true,
      'fecha_nacimiento' => true,
      'created_at' => true,
      'Actions' => true,
    ];
    $this->datatables(json_encode($datos, true), $columnas);
  }

  //agregar nuevo usuario
  public function NuevoUsuario()
  {
    $request = service('request');
    $nombreUsuario = $request->getPost('nombreUsuario');
    $apellidoUsuario = $request->getPost('apellidoUsuario');
    $correoElectronico = $request->getPost('correoElectronico');
    $cedulaIdentidad = $request->getPost('cedulaIdentidad');
    $telefonoUsuario = $request->getPost('telefonoUsuario');
    $direccionUsuario = $request->getPost('direccionUsuario');
    $generoUsuario = $request->getPost('generoUsuario');
    $fechaNacimientoFormatted = $request->getPost('fechaNacimientoFormatted');
    $data = [
      'nombre' => $nombreUsuario,
      'apellido' => $apellidoUsuario,
      'correo' => $correoElectronico,
      'cedula_identidad' => $cedulaIdentidad,
      'telefono' => $telefonoUsuario,
      'direccion' => $direccionUsuario,
      'genero' => $generoUsuario,
      'fecha_nacimiento' => $fechaNacimientoFormatted,
      'estado' => 1,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $UsuarioModel = new GestionUsuarioModel();
    try {
      $id = $UsuarioModel->insertar_Usuario($data);
      if ($id) {
        $response = array('success' => true, 'message' => "Usuario de nombre: " . $data['nombre'] . " fue insertado correctamente");
      } else {
        $response = array('error' => false, 'message' => "Error al insertar el usuario.");
      }
      return $this->response->setJSON($response);
    } catch (\Exception $e) {
      $response = array('success' => false, 'message' => "Ocurrió un error: " . $e->getMessage());
      return $this->response->setJSON($response);
    }
  }
  //actualizar  Usuario
  public function ActualizarUsuario()
  {
    $request = service('request');
    $id = $request->getPost('id');
    $nombreUsuario = $request->getPost('nombreUsuario');
    $apellidoUsuario = $request->getPost('apellidoUsuario');
    $correoElectronico = $request->getPost('correoElectronico');
    $cedulaIdentidad = $request->getPost('cedulaIdentidad');
    $telefonoUsuario = $request->getPost('telefonoUsuario');
    $direccionUsuario = $request->getPost('direccionUsuario');
    $generoUsuario = $request->getPost('generoUsuario');
    $fechaNacimientoFormatted = $request->getPost('fechaNacimientoFormatted');
    $data = [
      'nombre' => $nombreUsuario,
      'apellido' => $apellidoUsuario,
      'correo' => $correoElectronico,
      'cedula_identidad' => $cedulaIdentidad,
      'telefono' => $telefonoUsuario,
      'direccion' => $direccionUsuario,
      'genero' => $generoUsuario,
      'fecha_nacimiento' => $fechaNacimientoFormatted,
      'estado' => 1,
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $UsuarioModel = new GestionUsuarioModel();
    try {

      $id = $UsuarioModel->actualizar_Usuario($id, $data);

      if ($id == 0) {
        $response = array('success' => true, 'message' => "Usuario de nombre: " . $data['nombre'] . " fue actualizado correctamente");
      } else {
        $response = array('success' => false, 'message' => "Error al actualizar el usuario.");
      }
      return $this->response->setJSON($response);
    } catch (\Exception $e) {
      $response = array('success' => false, 'message' => "Ocurrió un error: " . $e->getMessage());
      return $this->response->setJSON($response);
    }
  }
  //elimanar cliente
  public function ElimanarUsuario()
  {
    $UsuarioModel = new GestionUsuarioModel();
    $request = service('request');
    $id = $request->getPost('id');
    $nombre = $request->getPost('nombre');
    try {
      // Intentar insertar los datos en la base de datos
      //    $id = $ClienteModel->elimanar_cliente($id);
      $id = $UsuarioModel->eliminar_Usuario($id);
      if ($id) {
        // Mensaje de éxito al insertar
        $response = array('success' => true, 'message' => "Usuario de nombre: " . $nombre . " fue elimanado correctamente");
      } else {
        // Mensaje de error si la inserción falla
        $response = array('success' => false, 'message' => "Error al elimanar el Usuario.");
      }

      return $this->response->setJSON($response); // Asegurarse de que la respuesta se devuelva siempre

    } catch (\Exception $e) {
      // Captura cualquier excepción y muestra el mensaje de error
      // $response = array('success' => false, 'message' => "Ocurrió un error: " . $e->getMessage());
      $response = array('success' => false, 'message' => "Ocurrió un error ");

      return $this->response->setJSON($response);
    }
  }
  //extraer datos del cliente para la actualizacion
  public function ExtracionUsuarioView()
  {
    $UsuarioModel = new GestionUsuarioModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      $datos = $UsuarioModel->Extracion_Datos_Usuario($id);
      echo json_encode($datos);
    } else {
      http_response_code(405); // Método no permitido
      echo json_encode(array("error" => "Método no permitido"));
    }
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
  //   public function crear_carpeta_almacenes($id)
  //   {
  //       $path = "recursos/qr/" . $id;

  //       if (!file_exists($path)) {
  //           mkdir($path, 0777, true);
  //       }
  //       return $path;
  //   }

  //   public function diferencia_dias($fecha)
  //   {
  //       $fechaActual = date('Y-m-d');
  //       $datetime1 = date_create($fecha);
  //       $datetime2 = date_create($fechaActual);
  //       $contador = date_diff($datetime1, $datetime2);
  //       $differenceFormat = '%a';
  //       $contador->format($differenceFormat);
  //       return $contador->format($differenceFormat) . " Dias Retraso";
  //   }
}
/* End of file Parametro_controller.php */
/* Location: ./application/controllers/Parametro_controller.php */



