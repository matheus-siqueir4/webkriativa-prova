<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/base.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/dae04ae8f6.js" crossorigin="anonymous"></script>
  <title>Sonho Encantado</title>
</head>
<body>
<nav>
    <div class="navbar-ul">
      <ul>
        <div class="icone-principal">
          <li><a href="/"><i class="fa-solid fa-moon" style="color: #ffff00;"></i>Sonho Encontado</a></li>
        </div>
        <!-- Usuário que não estão logados no sistema -->
        @guest
        <li class="nav-item"><a href="/register"><i class="fa-solid fa-user" style="color: #ffffff;"></i>Cadastrar-se</a></li>
        <li class="nav-item"><a href="/login"><i class="fa-solid fa-user" style="color: #ffffff;"></i>Login</a></li>
        @endguest
        <!-- Usuário logados -->
        @auth
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>Sair</a>
        </li>
        </form>
        <li class="nav-item"><a href="/dashboard"><i class="fa-solid fa-rocket" style="color: #ffffff;"></i>Minha Conta</a></li>
        <li class="nav-item"><a href="/clientes"><i class="fa-solid fa-user" style="color: #ffffff;"></i>Clientes</a></li>
        @endauth
        <li class="nav-item"><a href="/produto/cadastrar"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>Produtos</a></li>
        <li class="nav-item"><a href="/"><i class="fa-solid fa-house" style="color: #ffffff;"></i>Home</a>
      </ul>
  </nav>
  <section>
    <div class="container product_container">
      <img src="/images/sem-imagem.jpg" alt="imagem" />
      <div class="produto">
        <h1>{{$produto->nome}}</h1>
        <p>
          {{$produto->descricao}}
        </p>
        <div class="separaBotao">
          <form action="/produtos/excluir/{{$produto->id}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" type="submit">Excluir</button>
          </form>
          <button class="btn btn-primary"><a href="/produtos/editar/{{$produto->id}}">Editar</a></button>
          <button class="btn btn-primary"><a href="/produto/{{$produto->id}}">Adicionar aos pedidos</a></button>
        </div>
      </div>
    </div>
  </section>
</body>
</html>