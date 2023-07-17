<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Produto extends Model
{   
    use HasFactory;

    //declara a tabela que estou utilizando
    protected $table = 'produto';
    protected $guarded = [];
    public $timestamps = false;

    public function pedidos() {
        return $this->belongsToMany(User::class, 'pedido_produto', 'produto_id', 'users_id');
    }
}
