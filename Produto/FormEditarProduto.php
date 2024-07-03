<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Atualizar Produto</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link rel="stylesheet" href="../css/estilo_produto.css" />
    </head>

    <body>

        <?php
        include("../conectarbd.php");

        $recid = filter_input(INPUT_GET, 'editarid');

        $selecionar = mysqli_query($conn, "SELECT * FROM tb_produto WHERE id_produto=$recid");

        $campo = mysqli_fetch_array($selecionar);
        ?>

         <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="../img/logo.png" alt="" />
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
                  <li><a class="dropdown-item" href="../Cliente/ConsultarCliente.php">Consultar Cliente</a></li>
                  <li><a class="dropdown-item" href="../Cliente/FormCadCliente.html">Cadastrar Cliente</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Contato
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Contato/ConsultarContato.php">Consultar Contato</a></li>
                  <li><a class="dropdown-item" href="../Contato/FormCadContato.html">Cadastrar Contato</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Funcionário
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Funcionario/ConsultarFuncionario.php">Consultar Funcionário</a></li>
                  <li><a class="dropdown-item" href="../Funcionario/FormCadFuncionario.html">Cadastrar Funcionário</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Fornecedor
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Fornecedor/ConsultarFornecedor.php">Consultar Fornecedor</a></li>
                  <li><a class="dropdown-item" href="../Fornecedor/FormCadFornecedor.html">Cadastrar Fornecedor</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pedido
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Pedido/ConsultarPedido.php">Consultar Pedido</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Produto
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Produto/ConsultarProduto.php">Consultar Produto</a></li>
                  <li><a class="dropdown-item" href="../Produto/FormCadProduto.html">Cadastrar Produto</a></li>
              </ul>
          </div>
      </nav>
    </header>
        <!--Corpo da página -->
        <main >
            <section id="section-cliente">
                <h1>Atualizar Produto</h1>
                <br>
                <div class="d-flex justify-content-center">
                    <form method="post" action="EditarProduto.php" id="login">

                        <!esta linha cria um campo oculto para passar o id_cidade, pois senão ao clicar em Salvar o código não saberá onde salvar.-->
                        <input type="hidden" name="id" value="<?= $campo["id_produto"] ?>"> 

                        <p>
                            <label for="nome">Nome:</label>
                            <input value="<?= $campo["nome"] ?>" id="nome" name="nome" required type="text" placeholder="Insira o nome do produto" class="form-control">
                        </p>

                        <p>
                            <label for="tipo">Tipo:</label>
                            <select name="tipo" id="tipo" class="form-control">
                                value="<?= $campo["tipo"] ?>"
                                <option value="brinco">Brinco</option>
                                <option value="colar">Colar</option>
                                <option value="anel">Anel</option>
                                <option value="piercing">Piercing</option>
                                <option value="pulseira">Pulseira</option>
                                <option value="bracelete">Bracelete</option>
                                <option value="tornozeleira">Tornozeleira</option>
                                <option value="desconto">Desconto</option>
                                <option value="desconto30">Desconto30</option>
                                <option value="desconto40">Desconto40</option>
                            </select>
                        </p>


                        <p>
                            <label for="qtde">Quantidade:</label>
                            <input value="<?= $campo["qtde"] ?>" type="number" id="qtde" name="qtde" min="0" max="30" class="form-control">
                        </p>

                        <p>
                            <label for="valor">Valor:</label>
                            <input value="<?= $campo["valor"] ?>" id="valor" name="valor" required type="text" placeholder="Insira o valor do produto" class="form-control">
                        </p>

                        <p>
                            <label for="valor_compra">Valor de Compra:</label>
                            <input value="<?= $campo["valor_compra"] ?>" id="valor_compra" name="valor_compra" required type="text" placeholder="Insira o valor de compra do produto" class="form-control">
                        </p>

                        <p>
                            <label for="valor_venda">Valor de Venda:</label>
                            <input value="<?= $campo["valor_venda"] ?>" id="valor_venda" name="valor_venda" required type="text" placeholder="Insira o valor de venda do produto" class="form-control">
                        </p>
                        
                        <p>
                            <label for="imagem">Imagem:</label>
                            <input type="file" value="<?= $campo["imagem"] ?>" id="imagem" name="imagem" required placeholder="Insira a descrição do produto" class="form-control">
                        </p>
                        
                        <p>
                            <label for="descricao">Descrição:</label>
                            <input value="<?= $campo["descricao"] ?>" id="descricao" name="descricao" required placeholder="Insira a descrição do produto" class="form-control">
                        </p>

                        <p>
                            <input type="submit" value="Atualizar" class="btn btn-primary" id="bt-login">
                        </p>
                    </form>
                </div>
            </section>
        </main>

        <footer>
            <p></p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery-script.js"></script>
    </body>
</html>
