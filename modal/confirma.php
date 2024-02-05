<?php 

  $id_m = filter_input(INPUT_GET, 'id_m', FILTER_SANITIZE_NUMBER_INT);

  echo 'Quer salvar o registro? ';
  echo "<a href='processa_cadManutencao.php?id_m=$id_m'>sim</a> |";
  echo "<a href='../index.php'>não</a>";


 ?>