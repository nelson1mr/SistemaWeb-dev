<?php

namespace App\Models;

use CodeIgniter\Model;
use Kint\Parser\ToStringPlugin;

class GestionUsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'correo', 'cedula_identidad', 'telefono', 'direccion', 'genero', 'fecha_nacimiento', 'estado', 'created_at', 'updated_at'];
    //filter

    //Lista de Usuario
    public function ListaUsuario()
    {
        $table1 = 'usuarios';
        $sql = "SELECT id, nombre, apellido FROM $table1 WHERE estado =1;";
        $query = $this->query($sql);
        return $query->getResultArray();
    }

    //insertar datos de Usuario
    public function insertar_Usuario($data)
    {
        $this->insert(row: $data);
        return $this->insertID();
    }
    //elimanar dato
    public function eliminar_Usuario($id)
    {
        $data = ['estado' => 0];
        $this->update(id: $id, row: $data);
        return $this->affectedRows();
    }
    public function Extracion_Datos_Usuario($id)
    {
        $table = 'usuarios';
        $sql = "SELECT * FROM $table 
                        WHERE estado = 1 and  id=$id;";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function actualizar_Usuario($id, $data): int
    {
        $builder = $this->db->table(tableName: 'usuarios');

        $builder->set(key: 'nombre', value: $data['nombre'])
            ->set(key: 'apellido', value: $data['apellido'])
            ->set(key: 'correo', value: $data['correo'])
            ->set(key: 'cedula_identidad', value: $data['cedula_identidad'])
            ->set(key: 'telefono', value: $data['telefono'])
            ->set(key: 'direccion', value: $data['direccion'])
            ->set(key: 'genero', value: $data['genero'])
            ->set(key: 'fecha_nacimiento', value: $data['fecha_nacimiento'])
            ->set(key: 'estado', value: 1) // Estado fijo en 1
            ->set(key: 'updated_at', value: date(format: 'Y-m-d H:i:s')) // Fecha y hora actuales
            ->where(key: 'id', value: $id)
            ->update();
        return 0;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //creacion de perfil
    //insertar perfil
    public function insertar_Perfil($data)
    {
        try {
            $sql = "INSERT INTO login (id_usuario, correo, contraseña, estado, created_at, updates_at, rol, foto)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $this->db->query($sql, [
                $data['id_usuario'],
                $data['correo'],
                $data['contraseña'],
                $data['estado'],
                $data['created_at'],
                $data['updated_at'],
                $data['rol'],
                $data['foto']
            ]);

            return $this->db->insertID();
        } catch (\Exception $e) {
            log_message('error', 'Error en insertar_Perfil: ' . $e->getMessage());
            throw new \Exception("Error al insertar los datos: " . $e->getMessage());
        }
    }

    public function datos_perfil()
    {
        $sql = " select l.id,l.foto, u.nombre ,u.apellido,u.telefono,u.genero,l.correo,l.rol,l.created_at from login l
                join usuarios u on l.id_usuario = u.id
                where l.estado=1 ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function eliminar_perfil($id)
    {
        $builder = $this->db->table('login');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    //extraer datos perfil
    
    public function extracion_Datos_perfil($id)
    {
        $sql = "SELECT * FROM login
            WHERE id= $id; ";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
}
