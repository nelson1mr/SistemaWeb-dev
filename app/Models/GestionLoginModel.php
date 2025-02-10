<?php

namespace App\Models;

use CodeIgniter\Model;

class GestionLoginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'correo', 'contraseña', 'estado', 'created_at', 'updates_at'];
    //filter

    public function obtenerUsuario($correo)
{
    return $this->select('l.foto,l.id_usuario, u.correo, l.contraseña, u.nombre, u.apellido ,u.direccion, u.telefono, u.genero, l.rol,u.cedula_identidad,u.fecha_nacimiento,l.created_at') // Selecciona los campos necesarios
                ->from('login l')
                ->join('usuarios u', 'l.id_usuario = u.id', 'inner') // Realiza el join entre login y usuarios
                ->where('l.correo', $correo)
                ->where('l.estado', 1) // Asegura que el usuario esté activo
                ->first();
}


}
