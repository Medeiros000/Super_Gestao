<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at', 'updated_at', 'quantidade');
        /*
        1 - Modelo do relacionamento NxN em relação ao modelo que estamos implementando 
            Item::class (Modelo que estamos implementando)
        2 - É a tabela auxiliar que armazena os registros de relacionamento
            Table: pedidos_produtos
        3 - Representa o nome da fk da tabela mapeada pelo modelo na tabela de relacionamento
            Table: pedido_id
        4 - Representa o nome da fk da tabela mapeada pelo modelo que estamos implementando
            Ao invés de item_id (padrão esperado pelo Laravel) usamos produto_id
        */
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
