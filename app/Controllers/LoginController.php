<?php

namespace App\Controllers;

use App\Models\GestionLoginModel;

class LoginController extends BaseController
{
    public function indexLogin()
    {
        $session=session();
        $session->destroy();
        return view('1_Login/1_login_page_view.php');
    }

    public function acceso()
{
    $request = service('request');
    $email = $request->getPost('email');
    $password = $request->getPost('password');

    // Instancia del modelo
    $usuarioModel = new GestionLoginModel();
    $usuario = $usuarioModel->obtenerUsuario($email);

    if ($usuario && password_verify($password, $usuario['contraseña'])) {
        // Iniciar sesión y guardar datos del usuario en la sesión
        $session = session();

        $session->set([
            'isLoggedIn' => true,
            'id'     => $usuario['id_usuario'],
            'foto'     => $usuario['foto'],
            'nombre'     => $usuario['nombre'],
            'apellido'     => $usuario['apellido'],
            'correo'     => $usuario['correo'],
            'genero'   => $usuario['genero'],
            'direccion'   => $usuario['direccion'],
            'telefono'   => $usuario['telefono'],
            'rol'   => $usuario['rol'],
            'fecha_nacimiento'   => $usuario['fecha_nacimiento'],
            'cedula_identidad'   => $usuario['cedula_identidad']

        ]);

        // Respuesta JSON de éxito
        $response = [
            'success' => true,
            'message' => 'Inicio de sesión exitoso.'
        ];
    } else {
        // Respuesta JSON de error
        $response = [
            'error'   => true,
            'message' => 'Correo electrónico o contraseña incorrectos.'
        ];
    }

    // Devolver la respuesta en formato JSON
    return $this->response->setJSON($response);
}

       public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    
}

