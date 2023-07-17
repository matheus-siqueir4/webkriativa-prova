<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    //todas as páginas que necessitam de autenticação, exceto: 
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //Filtra e retorna os itens pesquisados na view
    public function index()
    {
        $search = request('search');

        if ($search) {
            $produtos = Produto::query(Produto::class)
                ->where('descricao', 'like', '%' . $search . '%')
                ->orWhere('nome', 'like', '%' . $search . '%')
                ->get();
        }

        //retorna todos os produtos contidos no banco
        else {
            $produtos = Produto::all();
        }

        return view('index', ['produtos' => $produtos, 'search' => $search]);
    }

    //Retorna view de cadastro de produto
    public function create()
    {

        return view('produtos.cadatrar');
    }

    //traz de forma detalhada em uma página separada o produto selecionado    
    public function show($id)
    {

        $produto = Produto::findOrFail($id);

        return view('produtos.detalhes', ['produto' => $produto]);
    }

    //adiciona um pedido
    public function adicionarPedido($id) {

        $pedido = new Pedido();

        $user = auth()->user();
        $pedido->users_id = $user->id;
        $pedido->produto_id = $id;

        $pedido->save();
        return redirect('/dashboard');
    }

    //Adiciona um novo produto
    public function store(Request $request) {
        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;

        $produto->save();
        return redirect('/');
    }

    //Seleciona um produto para editar e traz suas informações
    public function editProduto($id) {
        
        $produto = Produto::find($id);

        return view('produtos.editar', ['produto' => $produto]);
    }
    
    //Atualiza o produto
    public function updateProduto(Request $request) {
        Produto::find($request->id)->update($request->all());
        
        return redirect('/');
    }

    //Deleta um produto
    public function deleteProduto($id) {
        
        DB::table('pedido_produto')->where('produto_id', $id)->delete();
        DB::table('produto')->where('id', $id)->delete();
        
        return redirect('/');
    }
}
