<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Atualizar Funcionario</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link 
            rel="stylesheet" href="../css/estilo_funcionario.css" />
        
    </head>
    <body>
        
        
        <?php
        include("../conectarbd.php");

        $recid = filter_input(INPUT_GET, 'editarid');

        $selecionar = mysqli_query($conn, "SELECT * FROM tb_funcionario WHERE id_funcionario=$recid");

        $campo = mysqli_fetch_array($selecionar);
        ?> 
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
        <a class="navbar-brand" href="index.html">
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
                  <li><a class="dropdown-item" href="../Contato/FormCadContato.php">Cadastrar Contato</a></li>
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
        <main>
            <section id="section-cliente">
                <h1>Atualizar Funcionario</h1>
                
                <form method="post" action="EditarFuncionario.php." id="login">
                    
                        <input type="hidden" name="id" value="<?= $campo["id_funcionario"] ?>">
                        <div class="container">
                        <div class="row justify-content-center">  
                            <div class="col-md-6">
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
                        </div>

                        <div class="col-md-6">
                            <label for="data_nascimento">Data de Nascimento: </label>
                            <input
                                value="<?= $campo["data_nascimento"] ?>"
                                id="data_nascimento" 
                                name="data_nascimento"
                                required="required"
                                type="date"
                                placeholder="Coloque sua data de nascimento"
                                class="form-control"
                                />
                        </div>

                        <div class="col-md-6">
                            <label for="genero">Gênero:</label>
                            <select id="genero" name="genero" class="form-control sele-mudar" required>
                                value="<?= $campo["genero"] ?>"
                                <option value="">Selecione o gênero</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="estado_civil">Estado civil: </label>
                            <input
                                value="<?= $campo["estado_civil"] ?>"
                                id="estado_civil" 
                                name="estado_civil"
                                required="required"
                                type="text"
                                placeholder="Insira seu estado civil"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="escolaridade">Escolaridade: </label>
                            <input
                                value="<?= $campo["escolaridade"] ?>"
                                id="escolaridade" 
                                name="escolaridade"
                                required="required"
                                type="text"
                                placeholder="Insira a escolaridade"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cep">Cep: </label>
                            <input
                                value="<?= $campo["cep"] ?>"
                                id="cep" 
                                name="cep"
                                required="required"
                                type="text"
                                placeholder="Insira o seu cep"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="endereco">Endereço: </label>
                            <input
                                value="<?= $campo["endereco"] ?>"
                                id="endereco" 
                                name="endereco"
                                required="required"
                                type="text"
                                placeholder="Insira o endereço"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="num">num: </label>
                            <input
                                value="<?= $campo["num"] ?>"
                                id="num" 
                                name="num"
                                required="required"
                                type="text"
                                placeholder="Insira o num"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
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
                        </div>
                        
                        <div class="col-md-6">
                            <label for="bairro">Bairro: </label>
                            <input
                                value="<?= $campo["bairro"] ?>"
                                id="bairro" 
                                name="bairro"
                                required="required"
                                type="text"
                                placeholder="Insira seu bairro"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cidade">Cidade: </label>
                            <input
                                value="<?= $campo["cidade"] ?>"
                                id="cidade" 
                                name="cidade"
                                required="required"
                                type="text"
                                placeholder="Insira sua cidade"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="estado">Estado: </label>
                            <input
                                value="<?= $campo["estado"] ?>"
                                id="estado" 
                                name="estado"
                                required="required"
                                type="text"
                                placeholder="Insira seu estado"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="tel_fixo">Tel fixo: </label>
                            <input
                                value="<?= $campo["tel_fixo"] ?>"
                                id="tel_fixo" 
                                name="tel_fixo"
                                required="required"
                                type="text"
                                placeholder="Insira o tel/fixo"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="tel_cel">Tel Cel: </label>
                            <input
                                 value="<?= $campo["tel_cel"] ?>"
                                id="tel_cel" 
                                name="tel_cel"
                                required="required"
                                type="text"
                                placeholder="Insira o tel/cel"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="email">Email: </label>
                            <input
                                value="<?= $campo["email"] ?>"
                                id="email" 
                                name="email"
                                required="required"
                                type="text"
                                placeholder="Insira o seu email"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="funcao">Função: </label>
                            <input
                                value="<?= $campo["funcao"] ?>"
                                id="funcao" 
                                name="funcao"
                                required="required"
                                type="text"
                                placeholder="Insira a função"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="dat_admissao">Data admissao: </label>
                            <input
                                value="<?= $campo["dat_admissao"] ?>"
                                id="dat_admissao" 
                                name="dat_admissao"
                                required="required"
                                type="date"
                                placeholder="Insira seu estado civil"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="salario">Sálario: </label>
                            <input
                                value="<?= $campo["salario"] ?>"
                                id="salario" 
                                name="salario"
                                required="required"
                                type="text"
                                placeholder="Insira o salario"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="turno">Turno: </label>
                            <input
                                value="<?= $campo["turno"] ?>"
                                id="turno" 
                                name="turno"
                                required="required"
                                type="text"
                                placeholder="Insira o turno"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cpf">Cpf: </label>
                            <input
                                value="<?= $campo["cpf"] ?>"
                                id="cpf" 
                                name="cpf"
                                required="required"
                                type="text"
                                placeholder="Insira o cpf"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="rg">Rg: </label>
                            <input
                                 value="<?= $campo["rg"] ?>"
                                id="rg" 
                                name="rg"
                                required="required"
                                type="text"
                                placeholder="Insira o seu rg"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="orgao_emissor">Orgão Emissor: </label>
                            <input
                                value="<?= $campo["orgao_emissor"] ?>"
                                id="orgao_emissor" 
                                name="orgao_emissor"
                                required="required"
                                type="text"
                                placeholder="Escolha o orgão"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="uf">Uf: </label>
                            <input
                                value="<?= $campo["uf"] ?>"
                                id="uf" 
                                name="uf"
                                required="required"
                                type="text"
                                placeholder="Qual a uf"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="data_expedicao">Data Expedição: </label>
                            <input
                                value="<?= $campo["data_expedicao"] ?>"
                                id="data_expedicao" 
                                name="data_expedicao"
                                required="required"
                                type="date"
                                placeholder="Insira seu estado civil"
                                class="form-control"
                                />
                        </div>
                       
                        <div class="col-md-6">
                            <label for="ctps">Ctps: </label>
                            <input
                                value="<?= $campo["ctps"] ?>"
                                id="ctps" 
                                name="ctps"
                                required="required"
                                type="text"
                                placeholder="Insira o seu ctps"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="data_emissao">Data Emissão: </label>
                            <input
                                value="<?= $campo["data_emissao"] ?>"
                                id="data_emissao" 
                                name="data_emissao"
                                required="required"
                                type="date"
                                placeholder="Insira seu estado civil"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="pis">Pis: </label>
                            <input
                                value="<?= $campo["pis"] ?>"
                                id="pis" 
                                name="pis"
                                required="required"
                                type="text"
                                placeholder="Insira o seu pis"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="banco">Banco: </label>
                            <input
                                value="<?= $campo["banco"] ?>"
                                id="banco" 
                                name="banco"
                                required="required"
                                type="text"
                                placeholder="Insira o seu banco"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="agencia">Agência: </label>
                            <input
                                value="<?= $campo["agencia"] ?>"
                                id="agencia" 
                                name="agencia"
                                required="required"
                                type="text"
                                placeholder="Insira a sua agencia"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="conta">Conta: </label>
                            <input
                                value="<?= $campo["conta"] ?>"
                                id="conta" 
                                name="conta"
                                required="required"
                                type="text"
                                placeholder="Insira a conta"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="tipo">Tipo de conta: </label>
                            <input
                                value="<?= $campo["tipo"] ?>"
                                id="tipo" 
                                name="tipo"
                                required="required"
                                type="text"
                                placeholder="Insira o tipo de conta"
                                class="form-control"
                                />
                        </div>
                        
                        <div class="col-md-6">
                            <label for="pix">Pix: </label>
                            <input
                                value="<?= $campo["pix"] ?>"
                                id="pix" 
                                name="pix"
                                required="required"
                                type="text"
                                placeholder="Insira o seu pix"
                                class="form-control"
                                />
                        </div>                                         

                        <div class="col-md-6 margin-botao">
                            <input
                                type="submit"
                                value="Atualizar"
                                class="btn btn-primary"
                                id="bt-login"
                                />
                        </div>
                    </div>
                        </div>
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
        
        <script>

            var tel_fixo = document.getElementById("tel_fixo");

            tel_fixo.addEventListener("input", () => {
                var limparValor = tel_fixo.value.replace(/\D/g, "").substring(0, 11);
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

                tel_fixo.value = numeroformatado;
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