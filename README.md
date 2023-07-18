<h1 align="center">Sonho Encantado</h1>

<h2>Desafio</h2>
    O desafio consiste em implementar uma aplicação Web utilizando algum framework PHP(preferencialmente CodeIgniter) e um banco de dados relacional MySQL ou Postgres(preferencialmente), a criação das tabelas é livre para sua implementação. <br>
    Deve conter CRUDs para:<br><br>
    
- [x] Clientes
- [x] Produtos
- [x] Pedidos

<h3>Funcionalidades Obrigatórias</h3>

    - [x] Deve ser filtrável e ordenável por qualquer campo.
    - [x] Deve possuir formulários para criação e atualização de seus itens.
    - [x] Deve permitir a exclusão de qualquer item de sua lista.
    - [x] Barra de navegação entre os CRUDs.
    - [x] Links para os outros CRUDs nas listagens (Ex: link para o detalhe do cliente da compra na lista de pedidos de compra)

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- PHP (Laravel)
- JavaScript
- HTML5
- Bootstrap 5
- MYSQL
- Node.js
- CSS

### Requisitos
- PHP: ^8.2
- Laravel: 10.0x
- Node.js: 9.5
- MYSQL

### Instalando

Após isso, no terminal execute os Rode os comandos:
    
    https://github.com/matheus-siqueir4/webkriativa-prova.git
    cd .\webkriativa\
    composer install
    npm install

Crie apenas o banco de dados. Sem nenhuma tabela.

Após rodar esses comandos, renomeie o arquivo .env.example para .env e configure seu banco de dados:
    
![image](https://github.com/matheus-siqueir4/webkriativa-prova/assets/117112575/e1a01f95-1045-4af6-a127-d644bf4998d3)

Execute:

    php artisan key:generate
    php artisan migrate

Execute o arquivo em seu MYSQL que está localizado em webkriativa/database/script.sql - Ele irá gerar as tabelas.

Para finalizar, apenas inicie o serviço:

    npm run dev
    php artisan serve
