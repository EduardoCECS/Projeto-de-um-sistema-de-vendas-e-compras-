<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_POST, 'id');

$reccnpj= filter_input(INPUT_POST, 'cnpj');

$recnome= filter_input(INPUT_POST, 'nome');

$recemail= filter_input(INPUT_POST, 'email');

$rectel_cel= filter_input(INPUT_POST, 'tel_cel');

$rectel_fixo= filter_input(INPUT_POST, 'tel_fixo');

$recdescricao= filter_input(INPUT_POST, 'descricao');

  if(mysqli_query($conn, "UPDATE tb_fornecedor SET cnpj='$reccnpj', nome='$recnome', email='$recemail', tel_cel='$rectel_cel', tel_fixo='$rectel_fixo', descricao='$recdescricao' WHERE id_fornecedor=$recid")) {

    echo "<script>alert('Dados alterado com sucesso!'); window.location = 'ConsultarFornecedor.php';</script>";

  }else {

    echo "Não foi possível alterar os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>