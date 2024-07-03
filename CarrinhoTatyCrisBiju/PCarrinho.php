<?php
session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Importando jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Importando jQuery Mask Plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <title>Carrinho de Compra</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link rel="stylesheet" href="../css/estilo_cliente.css" />
        <link rel="icon" type="image/png" href="../img/logo.png">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="../index.php">
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
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="../index.php"> <b>Home</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Pedido/FormCadPedidoUsuario.html"><b>Pedido</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login.php"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Contato/FormCadContatoUsuario.php"><b>Contato</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                        </li>
                    </ul>

                    <!--Usuario logado-->

                    <ul class="navbar-nav mr-auto">
                        <!-- Outros itens de navegação aqui -->

                        <!-- Verifica se o usuário está logado -->
                        <?php if (isset($_SESSION['usuario'])) { ?>
                            <li class="nav-item">
                                <!-- Exibe uma mensagem de boas-vindas com o nome do usuário -->
                                <span class="nav-link text-white"><b>Olá, lindo(a):</b> <?php echo $_SESSION['usuario']; ?></span>
                            </li>
                            <li class="nav-item">
                                <!-- Adiciona um botão de sair -->
                                <a class="nav-link text-white" href="../logout.php"><b>Sair</b></a>
                            </li>
                        <?php } ?>
                    </ul>
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
        <main style="margin-top: 10%;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-light-blue text-white">
                                Produtos no Carrinho
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <?php
                                    include_once '../conectarbd.php';
                                    $valorTotal = 0;
                                    foreach ($_SESSION['carrinho'] as $key => $carrinho) {
                                        $sql = "SELECT * FROM tb_produto WHERE id_produto = '$key'";
                                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        while ($linha = mysqli_fetch_array($query)) {
                                            $somaTotal = $linha["valor_compra"] * $carrinho;
                                            $valorTotal += $somaTotal;
                                            ?>
                                            <tr style="background-color: #f8f9fa;">
                                                <td class="text-center align-middle">
                                                    <img src="../img/<?php echo $linha['imagem']; ?>" class="img-fluid rounded" style="padding: 5px;" width="64" alt="<?php echo $linha["nome"]; ?>">
                                                    <h5 class=""><?php echo $linha["nome"]; ?></h5>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span style="font-size: 2em;"><?php echo "R$ " . $linha["valor_compra"]; ?></span>
                                                    <h5>Valor</h5>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span style="font-size: 2em;"><?php echo $carrinho; ?></span>
                                                    <h5>Quantidade</h5>
                                                </td>


                                                <td class="text-center align-middle">
                                                    <span style="font-size: 2em;"><?php echo "R$ " . $somaTotal; ?></span>
                                                    <h5>Subtotal</h5>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Resumo do Carrinho</h5>
                                                <p style="margin-left: 50px;">
                                                    <label style="font-weight: normal;" for="forma_pg">Forma de Pagamento: </label>                                                                                                 
                                                    
                                                    <input type="hidden" name="forma_pg" value="<?php echo $forma_pg; ?>">

                                                    <select name="forma_pg" id="forma_pg" style="margin-left: -50px;" onchange="updateFormaPg()">
                                                        <option value="Selecionar">Selecionar</option>
                                                        <option value="pix">Pix</option>
                                                        <option value="cartao_credito">Cartão de Crédito</option>
                                                        <option value="cartao_debito">Cartão de Débito</option>
                                                    </select>




                                                </p>
                                                <div id="cartaoCreditoForm" style="display: none;">
                                                    <h5>Dados do Cartão de Crédito</h5>
                                                    <form id="formCartaoCredito">
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="numeroCartao" class="form-label">Número do Cartão</label>
                                                            <input type="text" class="form-control" id="numeroCartao" name="numeroCartao" placeholder="0000 0000 0000 0000" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="nomeTitular" class="form-label">Nome do Titular</label>
                                                            <input type="text" class="form-control" id="nomeTitular" name="nomeTitular" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="validade" class="form-label">Validade</label>
                                                            <input type="text" class="form-control" id="validade" name="validade" placeholder="MM/AA" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="codigoSeguranca" class="form-label">Código de Segurança</label>
                                                            <input type="text" class="form-control" id="codigoSeguranca" name="codigoSeguranca" placeholder="CVV" required>
                                                        </div>

                                                        <div id="bandeiraCartao" style="margin-left: 50px;"></div>

                                                    </form>
                                                </div>

                                                <div id="cartaoDebitoForm" style="display: none;">
                                                    <h5>Dados do Cartão de Débito</h5>
                                                    <form id="formCartaoDebito">
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="numeroCartaoDebito" class="form-label">Número do Cartão</label>
                                                            <input type="text" class="form-control" id="numeroCartaoDebito" name="numeroCartaoDebito" placeholder="0000 0000 0000 0000" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="nomeTitularDebito" class="form-label">Nome do Titular</label>
                                                            <input type="text" class="form-control" id="nomeTitularDebito" name="nomeTitularDebito" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label style="margin-left: 50px;" for="validadeDebito" class="form-label">Validade</label>
                                                            <input type="text" class="form-control" id="validadeDebito" name="validadeDebito" placeholder="MM/AA" required>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div id="pixInfo" style="display: none;">
                                                    <h5>Informações para pagamento via PIX</h5>
                                                    <p>Para realizar o pagamento via PIX, utilize a chave PIX ou o QR Code abaixo:</p>
                                                    <div id="chavePix" style="margin-bottom: 10px;">
                                                        <!-- Aqui será exibida a chave PIX ou o QR Code -->
                                                    </div>
                                                    <div id="qrCodePix" style="text-align: center;">
                                                        <!-- Aqui será exibido o QR Code -->
                                                    </div>
                                                </div>




                                                <p class="card-text">Total de produtos: <?php echo $_SESSION['contador']; ?></p>

                                                <p class="card-text">Valor Total: R$ <?php echo number_format($valorTotal, 2, ',', '.'); ?></p>
                                                <form action="../Pedido/CadastrarPedido.php" method="POST">
                                                    <input type="hidden" name="nome" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>">
                                                    <input type="hidden" name="forma_pg" value="<?php echo isset($_POST['forma_pg']) ? $_POST['forma_pg'] : 'pix, crédito e débito'; ?>">
                                                    <!-- Aqui você pode adicionar mais campos ocultos, se necessário -->
                                                    <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                                                </form>





                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p></p>
        </footer>
        <!-- script para identifica o tipo de cartão selecionado-->
        <!--script para forma de pagamento recuperar forma_pg -->
        <script>
            function updateFormaPg() {
                var formaPgSelect = document.getElementById("forma_pg");
                
                var selectedValue = formaPgSelect.options[formaPgSelect.selectedIndex].value;
                
            }
        </script>


        <!-- script para bandeira do cartao de credito -->

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Seleciona o input do número do cartão
                var numeroCartaoInput = document.getElementById('numeroCartao');

                // Adiciona um ouvinte de evento para verificar o número do cartão quando digitado
                numeroCartaoInput.addEventListener('input', function () {
                    // Obtém o valor do input do número do cartão
                    var numeroCartao = numeroCartaoInput.value.replace(/\s/g, ''); // Remove espaços em branco

                    // Array com padrões de expressões regulares para identificar bandeiras
                    var bandeiras = [
                        {
                            nome: 'Visa',
                            padrao: /^4/
                        },
                        {
                            nome: 'Mastercard',
                            padrao: /^5[1-5]/
                        },
                        {
                            nome: 'American Express',
                            padrao: /^3[47]/
                        },
                        {
                            nome: 'Discover',
                            padrao: /^6(?:011|5[0-9]{2})/
                        },
                        {
                            nome: 'Diners Club',
                            padrao: /^3(?:0[0-5]|[68][0-9])[0-9]{11}/
                        },
                        {
                            nome: 'JCB',
                            padrao: /^(?:2131|1800|35\d{3})\d{11}/
                        },
                        {
                            nome: 'Elo',
                            padrao: /^(?:401178|401179|431274|438935|451416|457393|457631|457632|504175|506699|5067|509040|636297|636368|636369|636297|636368|636369|504175|506699|5067|509040|636297|636368|636369|451416|457393|457631|457632|636297|636368|636369)\d{10}/
                        },
                        {
                            nome: 'Hipercard',
                            padrao: /^(606282\d{10}(\d{3})?)|(3841\d{15})/
                        },
                        {
                            nome: 'Aura',
                            padrao: /^(5078\d{2})(\d{2})(\d{11})$/
                        }
                    ];

                    // Verifica o padrão do número do cartão para identificar a bandeira
                    var bandeiraEncontrada = null;
                    for (var i = 0; i < bandeiras.length; i++) {
                        if (bandeiras[i].padrao.test(numeroCartao)) {
                            bandeiraEncontrada = bandeiras[i];
                            break; // Para no primeiro padrão encontrado
                        }
                    }

                    // Seleciona a div para exibir a bandeira do cartão
                    var bandeiraCartaoDiv = document.getElementById('bandeiraCartao');

                    // Se encontrar a bandeira, exibe a imagem correspondente
                    if (bandeiraEncontrada) {
                        // Exibe a imagem da bandeira correspondente
                        switch (bandeiraEncontrada.nome) {
                            case 'Visa':
                                bandeiraCartaoDiv.innerHTML = "<img src='../img/visa.png' alt='" + bandeiraEncontrada.nome + "' style='max-width: 100px;'>";
                                break;
                            case 'Mastercard':
                                bandeiraCartaoDiv.innerHTML = "<img src='../img/bandeiraMastercard.jpeg' alt='" + bandeiraEncontrada.nome + "' style='max-width: 100px;'>";
                                break;
                            case 'Elo':
                                bandeiraCartaoDiv.innerHTML = "<img src='../img/bandeiraElo.png' alt='" + bandeiraEncontrada.nome + "' style='max-width: 100px;'>";
                                break;
                                // Adicione outros casos conforme necessário para mais bandeiras
                            default:
                                bandeiraCartaoDiv.innerHTML = ""; // Limpa a div se não encontrar
                        }
                    } else {
                        bandeiraCartaoDiv.innerHTML = ""; // Limpa a div se não encontrar
                    }
                });
            });
        </script>


        <!--script para pix -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var formaPagamentoSelect = document.querySelector('select[name="forma_pg"]');
                var pixInfo = document.getElementById('pixInfo');
                var chavePixDiv = document.getElementById('chavePix');
                var qrCodePixDiv = document.getElementById('qrCodePix');

                formaPagamentoSelect.addEventListener('change', function () {
                    if (formaPagamentoSelect.value === "pix") {
                        pixInfo.style.display = 'block';
                        // Simulando uma chave PIX
                        var chavePix = "tatyCrisbiju@banco.com.br";
                        // Simulando um link para gerar QR Code (pode ser substituído pelo método real)
                        var qrCodeLink = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + encodeURIComponent(chavePix);

                        // Exibir a chave PIX
                        chavePixDiv.innerHTML = "<strong>Chave PIX:</strong> " + chavePix;
                        // Exibir o QR Code
                        qrCodePixDiv.innerHTML = "<img src='" + qrCodeLink + "' alt='QR Code PIX'>";
                    } else {
                        pixInfo.style.display = 'none';
                        // Limpar a chave PIX e o QR Code quando não for PIX
                        chavePixDiv.innerHTML = "";
                        qrCodePixDiv.innerHTML = "";
                    }
                });
            });
        </script>

        <!-- script cartao de credito -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Seleciona o elemento select
                var formaPagamentoSelect = document.querySelector('select[name="forma_pg"]');
                // Seleciona o formulário do cartão de crédito
                var cartaoCreditoForm = document.getElementById('cartaoCreditoForm');

                // Adiciona um ouvinte de evento para detectar alterações no select
                formaPagamentoSelect.addEventListener('change', function () {
                    // Se a opção selecionada for "cartao credito", mostra o formulário, caso contrário, oculta
                    if (formaPagamentoSelect.value === "cartao_credito") {
                        cartaoCreditoForm.style.display = 'block';
                    } else {
                        cartaoCreditoForm.style.display = 'none';
                    }
                });
            });
        </script>

        <!-- script cartao de debito -->

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Seleciona o elemento select
                var formaPagamentoSelect = document.querySelector('select[name="forma_pg"]');
                // Seleciona o formulário do cartão de débito
                var cartaoDebitoForm = document.getElementById('cartaoDebitoForm');

                // Adiciona um ouvinte de evento para detectar alterações no select
                formaPagamentoSelect.addEventListener('change', function () {
                    // Se a opção selecionada for "cartao debito", mostra o formulário, caso contrário, oculta
                    if (formaPagamentoSelect.value === "cartao_debito") {
                        cartaoDebitoForm.style.display = 'block';
                    } else {
                        cartaoDebitoForm.style.display = 'none';
                    }
                });
            });
        </script>

        <!-- script pix  -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Seleciona o elemento select
                var formaPagamentoSelect = document.querySelector('select[name="forma_pg"]');
                // Seleciona o formulário do PIX
                var pixInfo = document.getElementById('pixInfo');

                // Adiciona um ouvinte de evento para detectar alterações no select
                formaPagamentoSelect.addEventListener('change', function () {
                    // Se a opção selecionada for "pix", mostra o formulário, caso contrário, oculta
                    if (formaPagamentoSelect.value === "pix") {
                        pixInfo.style.display = 'block';
                    } else {
                        pixInfo.style.display = 'none';
                    }
                });
            });
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>

        <!-- Script para aplicar a máscara de CPF -->
        <script>
            $(document).ready(function () {
                $('#numeroCartao').mask('0000 0000 0000 0000');
                $('#validade').mask('00/00');
                $('#codigoSeguranca').mask('000');
            });
        </script>
    </body>
</html>
