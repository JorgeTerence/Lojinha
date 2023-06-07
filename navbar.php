<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/loja/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produto
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/loja/products/form.php">Cadastrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/loja/products/list_order.php">Listar - ordem</a></li>
            <li><a class="dropdown-item" href="/loja/products/list_expire.php">Listar - vencimento</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vendas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/loja/purchases/form.php">Cadastrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/loja/purchases/list_pagto.php">Listar - pagamento</a></li>
            <li><a class="dropdown-item" href="/loja/purchases/list_vendas.php">Listar - tudo</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuários
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/loja/user/form.php">Cadastrar cliente</a></li>
            <li><a class="dropdown-item" href="/loja/user/list.php">Listar - usuário</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
