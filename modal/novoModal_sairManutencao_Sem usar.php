<?php 

     include('../config/conexao.php');

// Quando clicar em enviar chama o metodo 'post'
    if ($_POST != NULL) {



  //Obtem os dados digitados pelo usuario
  $id_m = addslashes($_POST["id_m"]);
  $status = addslashes($_POST["status"]);
  $data_saida = addslashes($_POST["data_saida"]);
  $obss = addslashes($_POST["obs"]);


  //Cria comando SQL
  $sqlsair = "UPDATE historico_saida_manutencao_veiculo SET status = '$status', data_saida = $data_saida, obs = '$obss' WHERE id_m = $id_m"; 

  //Executa o SQL no BD
  $result = $con->query( $sqlsair );

  //Atualizou?
  if ($result == true) {
    echo "<script>
        alert('Atualizado com Sucesso!');
        location.href='../index.php';
    </script>";
  }else{
    echo "<script>
        alert('Erro ao Atualizar!');
        location.href='../index.php'; //redireciona para lista de clientes
    </script>";
  }

}

 ?>
<!-- Modal -->
<div class="modal fade" id="novoModal_sairManutencao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="novoModal_sairManutencaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="novoModal_sairManutencaopLabel">Saida Veiculo Manutenção</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data">

        <div class="row mb-3 g-3">
        <div class="col-2">
        <label>id_m</label>
        <input class="form-control" type="text" name="id_m" required>
        </div>
        <div class="col-6">
        <label>status</label>
        <input class="form-control" type="text" name="status" required>
        </div>
        </div>

        <div class="col-3">
        <label>data_saida</label>
        <input class="form-control" type="date" name="data_saida" required><br>
        </div>
        </div>

        <div class="col-5">
        <label>obs</label>
        <input class="form-control" type="text" name="obs"><br>
        </div>
   
  

            <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>