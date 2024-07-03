//efeito do botão voltar ao Topo

function topo() {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}

function formatPhoneNumber(phoneNumber) {
    phoneNumber = phoneNumber.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    phoneNumber = phoneNumber.replace(/^(\d{2})(\d)/g, '($1) $2'); // Adiciona o código de área entre parênteses
    phoneNumber = phoneNumber.replace(/(\d)(\d{4})$/, '$1-$2'); // Adiciona o hífen entre os últimos quatro dígitos
    return phoneNumber;
}

document.getElementById('tel_cel').addEventListener('input', function (e) {
    var target = e.target;
    var position = target.selectionStart; // Salva a posição do cursor antes da formatação
    var formattedPhoneNumber = formatPhoneNumber(target.value); // Formata o número de telefone
    target.value = formattedPhoneNumber; // Atualiza o valor do campo de entrada
    target.setSelectionRange(position, position); // Restaura a posição do cursor após a formatação
});


//Validação de Login
/*
function login() {
  var logado = 0;
  var usuario = document.getElementById("usuario").value;
  var senha = document.getElementById("senha").value;

  //validação simples

  if (usuario == "zed" && senha == "12345") {
    window.location = "index.html";
    logado = 1;
  }

  if (logado == 0) {
    alert("Erro! Acesso negado, dados incorretos.");
  }
}

//Ativar alert no botão cadastrar

function cadastro() {
  alert("Cadastrado com sucesso!");
  window.location.href = "index.html";
}
*/