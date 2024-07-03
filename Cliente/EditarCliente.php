<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_POST, 'id');

$recnome= filter_input(INPUT_POST, 'nome');

$recdata_nascimento= filter_input(INPUT_POST, 'data_nascimento');

$recendereco= filter_input(INPUT_POST, 'endereco');

$recnum= filter_input(INPUT_POST, 'num');

$reccomplemento= filter_input(INPUT_POST, 'complemento');

$reccpf= filter_input(INPUT_POST, 'cpf');

$rectel_cel= filter_input(INPUT_POST, 'tel_cel');

$recemail= filter_input(INPUT_POST, 'email');

$recsenha= filter_input(INPUT_POST, 'senha');



  if(mysqli_query($conn, "UPDATE tb_cliente SET nome='$recnome', data_nascimento='$recdata_nascimento', endereco='$recendereco', cpf='$reccpf', num='$recnum', complemento='$reccomplemento', tel_cel='$rectel_cel', email='$recemail', senha='$recsenha' WHERE id_cliente=$recid")) {

    echo "<script>alert('Dados alterado com sucesso!'); window.location = 'ConsultarCliente.php';</script>";

  }else {

    echo "Não foi possível alterar os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>