<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
        /*
        1 - Modelo do relacionamento NxN em relação ao modelo que estamos implementando
        2 - É a tabela auxiliar que armazena os registros de relacionamento
        3 - Representa o nome da fk da tabela mapeada pelo modelo na tabela de relacionamento
        4 - Representa o nome da fk da tabela mapeada pelo modelo que estamos implementando
        */
    }
}
