<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Simular un usuario autenticado
        $session = session();
        $session->set([
            'isLoggedIn' => true,
            'userId' => 1, // ID del usuario simulado
            'userName' => 'Desarrollador', // Nombre del usuario simulado
            'userEmail' => 'dev@example.com' // Correo del usuario simulado
        ]);

        // Redirigir a la página principal o al dashboard
        return redirect()->to('/cpcc');
    }
}