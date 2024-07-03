<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_POST, 'id');

$recnome= filter_input(INPUT_POST, 'nome');

$rectipo= filter_input(INPUT_POST, 'tipo');

$recqtde= filter_input(INPUT_POST, 'qtde');

$recvalor= filter_input(INPUT_POST, 'valor');

$recvalor_compra= filter_input(INPUT_POST, 'valor_compra');

$recvalor_venda= filter_input(INPUT_POST, 'valor_venda');

$recimagem= filter_input(INPUT_POST, 'imagem');

$recdescricao= filter_input(INPUT_POST, 'descricao');


  if(mysqli_query($conn, "UPDATE tb_produto SET nome='$recnome', tipo='$rectipo', qtde='$recqtde', valor='$recvalor', valor_compra='$recvalor_compra', valor_venda='$recvalor_venda',imagem='$recimagem', descricao='$recdescricao' WHERE id_produto=$recid")) {

    echo "<script>alert('Dados alterado com sucesso!'); window.location = 'ConsultarProduto.php';</script>";

  }else {

    echo "Não foi possível alterar os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>