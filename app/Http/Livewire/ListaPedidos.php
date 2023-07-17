<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ListaPedidos extends Component
{
    public function render(Request $request)
    {
        $userId = Auth::id();
        $name = Auth::user()->name;
        $search = $request->input('search');

        $query = Pedido::join('produto', 'pedido_produto.produto_id', '=', 'produto.id')
            ->select('pedido_produto.id', 'produto.nome', 'pedido_produto.situacao')
            ->where('pedido_produto.users_id', $userId);

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('produto.nome', 'like', '%' . $search . '%')
                    ->orWhere('pedido_produto.situacao', 'like', '%' . $search . '%')
                    ->orWhere('pedido_produto.id', 'like', '%' . $search . '%');
            });
        }

        $pedidos = $query->get();

        return view('dashboard', compact('pedidos', 'name', 'search'));
        
    }
}
