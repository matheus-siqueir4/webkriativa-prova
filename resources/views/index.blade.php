<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/base.css" />

    <script src="https://kit.fontawesome.com/dae04ae8f6.js" crossorigin="anonymous"></script>
    <title>Sonho Encantado</title>
</head>

<body>
    <!-- NAVBAR -->
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
    <!-- Campo de Busca -->
    <form action="/" method="get">
        <div class="div-search">
            <label for="search" class="label-search">Buscar: </label>
            <input type="search" value="{{ $search }}" name="search" placeholder="Pesquisar..."><i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        </div>
    </form>
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @endif
    <!-- Produtos -->
    <section class="courses">
        <div class="container courses_container">
            <!-- Percorre os produtos existentes no banco -->
            @foreach($produtos as $produto)
            <article class="course">
                <div class="course_image">
                    <img src="images/sem-imagem.jpg" />
                </div>
                <div class="course_info">
                    <h4>{{$produto->nome}}</h4>
                    <p>
                        {{$produto->descricao}}
                    </p>
                    <a href="/produtos/detalhes/{{$produto->id}}" class="btn btn-primary">Saiba mais</a>
                </div>
            </article>
            @endforeach

            <!-- Verifica se há produtos e busca -->
            @if(count($produtos) == 0 && $search)
            <h2>Nenhum resultado encontrado</h2>
            <p><a href="/">Ver todos</a></p>

            @elseif(count($produtos) == 0)
            <h2>Não há nenhum produto no momento</h2>
            @endif
        </div>
    </section>
</body>

</html>