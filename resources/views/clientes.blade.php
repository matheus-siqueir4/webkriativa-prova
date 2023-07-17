<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/navbar.css">
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
  <form action="/clientes" method="get">
        <div class="div-search">
            <label for="search" class="label-search">Buscar: </label>
            <input type="search" value="" name="search" placeholder="Pesquisar..."><i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        </div>
    </form>
  <section id="clientes">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($users as $user)
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>