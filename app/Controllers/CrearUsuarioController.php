<?php

namespace App\Controllers;

use App\Models\GestionUsuarioModel;

class CrearUsuarioController extends BaseController
{
    public function vistaPerfil()
    {
      //  return view('1_BasePrincipal/saludo.php');
      $session=session();
      $data = [
        'foto'    => $session->get('foto'),
        'nombre'    => $session->get('nombre'),
        'apellido'    => $session->get('apellido'),
        'genero'    => $session->get('genero'),
        'correo'    => $session->get('correo'),
        'direccion'    => $session->get('direccion'),
        'telefono'  => $session->get('telefono'),
        'rol'    => $session->get('rol'),
        'fecha_nacimiento'    => $session->get('fecha_nacimiento'),
        'cedula_identidad'    => $session->get('cedula_identidad'),

    ];

      return 
      view('2_Cuerpo/1_Esquema/1_begin_page_view.php') .
      view('2_Cuerpo/1_Esquema/2_head_page_view.php') .
      view('2_Cuerpo/1_Esquema/3_theme_page_view.php') .
      view('2_Cuerpo/1_Esquema/4_header_page_view.php',$data) .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('3_Usuario/2_Crear_Usuario_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
      ;
    }
    public function administradorPerfil()
    {
      //  return view('1_BasePrincipal/saludo.php');
      $model=new GestionUsuarioModel();
      $datosUsuarios = $model->ListaUsuario();
      $session=session();
      $data1 = [
        "Usuario" => $datosUsuarios,
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
      view('2_Cuerpo/1_Esquema/4_header_page_view.php',$data1) .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('3_Usuario/3_Administrador_Usuario_page_view.php',$data1) .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
      ;
    }
    //insertar nuevo perfil
    public function agregarPerfil()
    {
        try {
            $request = service('request');
            if ($request->getFile('filePerfil')->isValid()) {
                $avatar = $request->getFile('filePerfil');
                $avatar->move(ROOTPATH . 'public/uploads/perfil/');
                $rutaAvatar = $avatar->getName();
    
                $data = [
                    'id_usuario' => $request->getPost('usuario'),
                    'correo' => $request->getPost('correo'),
                    'contraseña' => password_hash($request->getPost('contraseña'), PASSWORD_DEFAULT),
                    'estado' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'rol' => $request->getPost('rol'),
                    'foto' => $rutaAvatar,
                ];
    
                $automovilModel = new GestionUsuarioModel();
                $automovilModel->insertar_Perfil($data);
    
                return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
            } else {
                return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Imagen no válida']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error en agregarPerfil: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['success' => false, 'message' => 'Error al guardar los datos: ' . $e->getMessage()]);
        }
    }
    //visualizar datos en la tabla 
    public function DatosPerfilView()
    {

        $perfilModel = new GestionUsuarioModel();
        $datos = $perfilModel->datos_perfil();
        $columnas = [
            'id' => true,
            'foto' => true,
            'nombre' => true,
            'apellido' => true,
            'telefono' => true,
            'genero' => true,
            'correo' => true,
            'rol' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //eliminar datos
    public function ElimanarPerfil()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $perfilModel = new GestionUsuarioModel();
        $perfilModel->eliminar_perfil($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
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

