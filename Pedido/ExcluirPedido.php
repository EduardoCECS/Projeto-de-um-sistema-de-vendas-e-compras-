<?php

include("../conectarbd.php");

$recid= filter_input(INPUT_GET, 'pedido');



  if(mysqli_query($conn, "DELETE FROM tb_pedido WHERE id_pedido=$recid")) {

    echo "<script>alert('Dados excluidos com sucesso!'); window.location = 'ConsultarPedido.php';</script>";

  }else {

    echo "Não foi possível excluir os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>