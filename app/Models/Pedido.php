<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produto;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pedido_produto';
    protected $guarded = [];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
