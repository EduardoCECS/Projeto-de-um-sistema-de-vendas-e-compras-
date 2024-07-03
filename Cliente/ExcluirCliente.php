<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_GET, 'cliente');



  if(mysqli_query($conn, "DELETE FROM tb_cliente WHERE id_cliente=$recid")) {

    echo "<script>alert('Dados excluidos com sucesso!'); window.location = 'ConsultarCliente.php';</script>";

  }else {

    echo "Não foi possível excluir os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>