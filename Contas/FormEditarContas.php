<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Editar contas</title>
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

        $selecionar = mysqli_query($conn, "SELECT * FROM tb_contas WHERE id_conta=$recid");

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
                            <li><a class="dropdown-item" href="../Contas/ConsultarContas.php">Consultar</a></li>
                            <li><a class="dropdown-item" href="../Contas/FormCadContas.html">Cadastrar</a></li>
                        </ul>
                        
                    </div>
            </nav>
        </header>
        <!--Corpo da página -->
        <main>
            <section id="section-cliente" style="margin-top: 2%;">
                <h1>Atualizar Contas</h1>
                <br>
                <div class="d-flex justify-content-center">
                    <form method="post" action="../Contas/CadastrarContas.php" id="cadastro-conta">
                        <!-- Campos para cadastro de conta -->
                        <p>
                            <label for="tipo_conta">Tipo de Conta:</label>
                            <select id="tipo_conta" name="tipo_conta" class="form-control">
                                <option value="agua">Água</option>
                                <option value="luz">Luz</option>
                                <option value="internet">Internet</option>
                                <!-- Adicione mais opções conforme necessário -->
                            </select>
                        </p>
                        <p>
                            <label for="descricao">Descrição:</label>
                            <input id="descricao" name="descricao" required="required" type="text" placeholder="Insira uma descrição" class="form-control" />
                        </p>
                        <p>
                            <label for="valor">Valor:</label>
                            <input id="valor" name="valor" required="required" type="text" placeholder="Insira o valor" class="form-control" />
                        </p>
                        <p>
                            <label for="data_vencimento">Data de Vencimento:</label>
                            <input id="data_vencimento" name="data_vencimento" required="required" type="date" class="form-control" />
                        </p>
                        <p>
                            <label for="status_conta">Status da Conta:</label>
                            <select id="status_conta" name="status_conta" class="form-control">
                                <option value="pendente">Pendente</option>
                                <option value="pago">Pago</option>
                                <!-- Adicione mais opções conforme necessário -->
                            </select>
                        </p>
                        <p>
                            <label for="observacoes">Observações:</label>
                            <textarea id="observacoes" name="observacoes" placeholder="Insira observações adicionais" class="form-control"></textarea>
                        </p>
                        <p>
                            <input type="submit" value="Atualizar" class="btn btn-primary" />
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
