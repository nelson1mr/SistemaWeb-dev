<?php

namespace App\Models;

use CodeIgniter\Model;

class GestionPedidosModel extends Model
{
    protected $table = 'pedido'; // Cambia por el nombre de tu tabla
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'usuario_id',
        'mes',
        'semana',
        'op',
        'nombre_cliente',
        'peso',
        'maquina_impresion',
        'medida_bolsa',
        'precio_bolsa',
        'impresion',
        'material',
        'maquina_extrucion',
        'medida_extrucion',
        'material1_impresion',
        'material2_laminado',
        'material3_laminado',
        'notas',
        'tipo_pedido',
        'estado',
        'created_at',
        'updated_at',
    ];

    public function insertar_Pedido(array $data)
    {
        return $this->insert($data);
    }
    public function obtenerPedidoExtrucion($valor)
    {
        return $this->select('
                    pedido.id,
                    usuarios.nombre AS nombre_usuario, 
                    usuarios.apellido AS apellido_usuario, 
                    pedido.precio_bolsa, 
                    pedido.material, 
                    tipos_trabajo.nombre AS tipo_trabajo, 
                    pedido.notas, 
                    pedido.created_at
                ')
                ->join('usuarios', 'pedido.usuario_id = usuarios.id')
                ->join('tipos_trabajo', 'pedido.tipo_pedido = tipos_trabajo.id')
                ->where('pedido.estado', 1)
                ->where('pedido.tipo_pedido', $valor)
                ->findAll();
    }
    public function obtenerPedidoExtrucionId($id)
    {
        return $this->select('mes, semana, op, nombre_cliente, peso, maquina_impresion, medida_bolsa, impresion, precio_bolsa, material, medida_extrucion, maquina_extrucion,material1_impresion,material2_laminado,material3_laminado')
                    ->where('id', $id)
                    ->first();
    }
    public function eliminarOrdenExtrucion($id)
    {
        $builder = $this->db->table('pedido');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    


}

