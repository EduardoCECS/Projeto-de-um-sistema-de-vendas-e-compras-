<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Atualizar Cliente</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link rel="stylesheet" href="../css/estilo_cliente.css" />
    </head>

    <body>

        <?php
        include("../conectarbd.php");

        $recid = filter_input(INPUT_GET, 'editarid');

        $selecionar = mysqli_query($conn, "SELECT * FROM tb_cliente WHERE id_cliente=$recid");

        $campo = mysqli_fetch_array($selecionar);
        ?>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="">
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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cliente
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Cliente/ConsultarCliente.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="../Cliente/FormCadCliente.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Contato
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Contato/ConsultarContato.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="../Contato/FormCadContato.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Funcionário
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Funcionario/ConsultarFuncionario.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="../Funcionario/FormCadFuncionario.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Fornecedor
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Fornecedor/ConsultarFornecedor.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="../Fornecedor/FormCadFornecedor.html">Cadastrar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pedido
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Pedido/ConsultarPedido.php">Consultar</a></li>
              </ul>
          </div>
          
          <div class="dropdown" style="margin-left: 20px">
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Produto
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Produto/ConsultarProduto.php">Consultar</a></li>
                  <li><a class="dropdown-item" href="../Produto/FormCadProduto.html">Cadastrar</a></li>
              </ul>
          </div>
                    <form class="ms-auto me-2 d-flex">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="O que deseja buscar"
                            aria-label="Search"
                            />
                        <button class="btn btn-outline-info" type="submit">
                            Buscar
                        </button>
                    </form>
                </div>
            </nav>
        </header>
        <!--Corpo da página -->
        <main>
            <section id="section-cliente">
                <h1>Atualizar Cliente</h1>
                <br>
                <div class="d-flex justify-content-center">
                    <form method="post" action="EditarCliente.php" id="login">

                        <!esta linha cria um campo oculto para passar o id_cidade, pois senão ao clicar em Salvar o código não saberá onde salvar.-->
                        <input type="hidden" name="id" value="<?= $campo["id_cliente"] ?>"> 

                        <p>
                            <label for="nome">Nome: </label>
                            <input
                                value="<?= $campo["nome"] ?>"
                                id="nome" 
                                name="nome"
                                required="required"
                                type="text"
                                placeholder="Insira o seu nome"
                                class="form-control"
                                />
                        </p>
                        
                        <p>
                            <label for="data_nascimento">Data de Nascimento: </label>
                            <input
                                value="<?= $campo["data_nascimento"] ?>"
                                id="data_nascimento" 
                                name="data_nascimento"
                                required="required"
                                type="date"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="endereco">Endereço: </label>
                            <input
                                value="<?= $campo["endereco"] ?>"
                                id="endereco" 
                                name="endereco"
                                required="required"
                                type="text"
                                placeholder="Coloque o seu endereço"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="num">Num: </label>
                            <input
                                value="<?= $campo["num"] ?>"
                                id="num" 
                                name="num"
                                required="required"
                                type="text"
                                placeholder="Insira o num"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="complemento">Complemento: </label>
                            <input
                                value="<?= $campo["complemento"] ?>"
                                id="complemento" 
                                name="complemento"
                                required="required"
                                type="text"
                                placeholder="Insira o complemento"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="tel_cel">Telefone/Celular: </label>
                            <input
                                value="<?= $campo["tel_cel"] ?>"
                                id="tel_cel" 
                                name="tel_cel"
                                required="required"
                                type="text"
                                placeholder="Insira o telefone/celular"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="cpf">Cpf: </label>
                            <input
                                value="<?= $campo["cpf"] ?>"
                                id="cpf" 
                                name="cpf"
                                required="required"
                                type="text"
                                minlength="3"
                                placeholder="Insira o seu cpf"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <label for="email">Email: </label>
                            <input
                                value="<?= $campo["email"] ?>"
                                id="email" 
                                name="email"
                                required="required"
                                type="email"
                                placeholder="Insira o seu email"
                                class="form-control"
                                />
                        </p>
                        <p>
                            <label for="senha">Senha: </label>
                            <input
                                value="<?= $campo["senha"] ?>"
                                id="senha" 
                                name="senha"
                                required="required"
                                type="password"
                                placeholder="Insira a sua senha"
                                class="form-control"
                                />
                        </p>

                        <p>
                            <input
                                type="submit"
                                value="Atualizar"
                                class="btn btn-primary"
                                id="bt-login"
                                />
                        </p>
                    </form>



                </div>
            </section>

        </main>

        <footer>
            <p></p>
        </footer>

        <script>

            var tel_cel = document.getElementById("tel_cel");

            tel_cel.addEventListener("input", () => {
                var limparValor = tel_cel.value.replace(/\D/g, "").substring(0, 11);
                var numerosArray = limparValor.split("");
                var numeroformatado = "";

                if (numerosArray.length > 0) {
                    numeroformatado += `(${numerosArray.slice(0, 2).join("")})`;
                }

                if (numerosArray.length > 2) {
                    numeroformatado += ` ${numerosArray.slice(2, 7).join("")}`;
                }

                if (numerosArray.length > 7) {
                    numeroformatado += `-${numerosArray.slice(7, 11).join("")}`;
                }

                tel_cel.value = numeroformatado;
            });

        </script>
        
        <!-- Script para aplicar a máscara de CPF -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
                $(document).ready(function () {
                    $('#cpf').mask('000.000.000-00', {reverse: true});

                });
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"
        ></script>
        <script src="js/script.js"></script>

        <script
            src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"
        ></script>
        <script type="text/javascript" src="js/jquery-script.js"></script>
    </body>
</html>
