<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_GET, 'fornecedor');



  if(mysqli_query($conn, "DELETE FROM tb_fornecedor WHERE id_fornecedor=$recid")) {

    echo "<script>alert('Dados excluidos com sucesso!'); window.location = 'Consultarfornecedor.php';</script>";

  }else {

    echo "Não foi possível excluir os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>