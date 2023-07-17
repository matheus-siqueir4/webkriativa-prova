<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //Deleta um pedido do usuário
    public function deletePedido($id)
    {

        Pedido::find($id)->delete();

        return redirect('/dashboard');
    }

    //Cancela o pedido
    public function updateStatus($id)
    {

        $status = Pedido::find($id);
        $status->situacao = 'Cancelado';
        $status->save();

        return redirect('/dashboard');
    }

    //Paga um pedido
    public function updatePagamento($id)
    {
        $status = Pedido::find($id);
        $status->situacao = 'Pago';
        $status->save();

        return redirect('/dashboard');
    }

    public function allUsers()
    {   
        $search = request('search');

        if ($search) {
            $users = User::query(User::class)
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->get();
        }

        //retorna todos os produtos contidos no banco
        else {
            $users = User::all();
        }
        
        return view('clientes', ['users' => $users, 'search' => $search]);
    }

}
