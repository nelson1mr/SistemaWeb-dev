<?php

namespace App\Models;

use CodeIgniter\Model;

class ScrafModel extends Model
{
    protected $table = 'scraf';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_pedido',
        'item',
        'columna1',
        'columna2',
        'columna3',
        'columna4',
        'columna5',
        'columna6',
        'columna7',
        'columna8',
        'suma',
        'estado',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true; // Activar manejo automático de `created_at` y `updated_at`

    // Método para obtener los datos con la consulta adaptada
    public function getPedidoDetails()
    {
        return $this->db->table('scraf sc')
            ->select('pe.mes, pe.semana, pe.op, pe.nombre_cliente, pe.peso, pe.maquina_impresion, pe.medida_bolsa, pe.precio_bolsa, pe.impresion, pe.material, tp.nombre, sc.item, sc.columna1, sc.columna2, sc.columna3, sc.columna4, sc.columna5, sc.columna6, sc.columna7, sc.columna8, sc.suma')
            ->join('pedido pe', 'pe.id = sc.id_pedido')
            ->join('tipos_trabajo tp', 'pe.tipo_pedido = tp.id')
            ->where('pe.estado', 1)
            ->get()
            ->getResultArray(); // Obtiene los resultados como un array
    }
}
