<?php

include("../conectarbd.php");

$recid_contato= filter_input(INPUT_POST, 'id');

$recnome= filter_input(INPUT_POST, 'nome');

$rectel_cel= filter_input(INPUT_POST, 'tel_cel');

$recemail= filter_input(INPUT_POST, 'email');





  if(mysqli_query($conn, "UPDATE tb_contato SET nome='$recnome', tel_cel='$rectel_cel', email='$recemail' WHERE id_contato=$recid_contato")) {

    echo "<script>alert('Dados alterado com sucesso!'); window.location = 'ConsultarContato.php';</script>";

  }else {

    echo "Não foi possível alterar os dados no Banco de Dados" . $recid_contato . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>