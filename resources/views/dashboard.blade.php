<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Document</title>
</head>

<body>

    <form action="/dashboard" method="get">
        <div class="div-search">
            <label for="search" class="label-search">Buscar: </label>
            <input type="search" value="{{ $search }}" name="search" placeholder="Pesquisar..."><i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        </div>
    </form>
    <table class="table caption-top">
        <caption>Lista de Pedidos</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Status</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Cancelar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <th scope="row">{{$pedido->id}}</th>
                <td>{{$pedido->nome}}</td>
                <td>{{$pedido->situacao}}</td>
                <td>
                    @if($pedido->situacao != 'Cancelado' && $pedido->situacao != 'Pago')
                    <form action="/status/pagar/{{$pedido->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button submit="submit" class="btn btn-primary">Pagar</button>
                    </form>
                    @elseif($pedido->situacao == 'Pago')
                    Pagamento Efetuado.
                    @else
                    Não é mais possível Pagar.
                    @endif
                </td>
                <td>
                    @if($pedido->situacao == 'Cancelado')
                    <form action="/pedidos/excluir/{{$pedido->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button submit="submit" class="btn btn-primary">Remover</button>
                    </form>
                    @else
                    <form action="/status/update/{{$pedido->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button submit="submit" class="btn btn-primary">Cancelar</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>