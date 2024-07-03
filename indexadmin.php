<?php
// Inclui o arquivo de verificação de login do admin
include_once './verificar_login_admin.php';

// Restante do código da página do painel de administração
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CrisBiju</title>

    <link
      rel="stylesheet"
      href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/estilo_produtos.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
          <a class="navbar-brand" href="index.php">
          <img src="img/logo.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

          <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cliente
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Cliente/ConsultarCliente.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Cliente/FormCadCliente.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Contato
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Contato/ConsultarContato.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Contato/FormCadContato.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Funcionário
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Funcionario/ConsultarFuncionario.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Funcionario/FormCadFuncionario.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Fornecedor
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Fornecedor/ConsultarFornecedor.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Fornecedor/FormCadFornecedor.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pedido
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Pedido/ConsultarPedido.php">Consultar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Produto
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Produto/ConsultarProduto.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Produto/FormCadProduto.html">Cadastrar</a></li>
              </ul>
          </div>
          
          
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cliente aniversariante
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Aniversariante/Aniversariante.php">Consultar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cliente VIP
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ClienteVip/clientevip.php">Consultar</a></li>
              </ul>
          </div>
          
            <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Contas
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Contas/ConsultarContas.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="Contas/FormCadContas.html">Cadastrar</a></li>
              </ul>
          </div>
          
      </nav>
    </header>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    

   

    

    <script
      src="https://code.jquery.com/jquery-3.6.4.min.js"
      integrity="sha256-oP6HI/t1q6Fgi/jtuo8qZyk1hC0XL2XqnBsf2oIQsh0="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
