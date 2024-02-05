<?php 
include('../config/conexao.php');



if ($_POST != NULL) {

  //Obtem os dados digitados pelo usuario
  $id = addslashes($_POST["id"]);
  $status = addslashes($_POST["status"]);
  $c_custo = addslashes($_POST["c_custo"]);
  $oficina = addslashes($_POST["oficina"]);
  $cidade = addslashes($_POST["cidade"]);
  $data_entrada = addslashes($_POST["data_entrada"]);
  $data_saida = addslashes($_POST["data_saida"]);
  $obs = addslashes($_POST["obs"]);
  

  
   // $sql = "INSERT INTO historico_manutencao_veiculo (id, status, oficina, cidade, data_entrada, data_saida, obs) VALUES ('$id', '$status', '$oficina', '$cidade', '$data_entrada', '$data_saida', '$obs')";
   // $result = mysqli_query($con, $sql);
  
      

        //Atualizou?
        if ($result == true) {
          echo "<script>
              alert('Atualizado com Sucesso!');
              Location.href='../index.php';
          </script>";
        }else{
          echo "<script>
              alert('Erro ao Atualizar!');
              Location.href='../index.php'; //redireciona para lista de clientes
          </script>";
        }

  }
 ?>

<!-- Modal -->
<div class="modal fade" id="novoModal_cadManutencao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="novoModal_cadManutencaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="novoModal_cadManutencaoLabel">Manutenção</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mb-3 g-3">
            <div class="col-3">
            <label>id</label>
            <input class="form-control" type="text" name="id" required>
            </div>
            <div class="col-7">
            <label>status</label>
            <input class="form-control" type="text" name="status" required>
            </div>
            </div>

            <div class="row mb-3 g-3">
            <div class="col-3">
            <label>oficina</label>
            <input class="form-control" type="text" name="oficina" required><br>
            </div>
            <div class="col-6">
            <label>cidade</label>
            <input class="form-control" type="text" name="cidade" required><br>
            </div>
            </div>

            <div class="row mb-3 g-3">
            <div class="col-6">
            <label>data_entrada</label>
            <input class="form-control" type="date" name="data_entrada" required><br>
            </div>
            <div class="col-6">
            <label>data_saida</label>
            <input class="form-control" type="date" name="data_saida" ><br>
            </div>
            </div>
            
            <div class="row mb-3 g-3">
            <div class="col-3">
            <label>obs</label>
            <input class="form-control" type="text" name="obs"><br>
            </div>
            </div>
            

            <div>
              <input type="reset" name="limpa" value="Limpar">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
              <button type="submit" id="click" class="btn btn-primary">Salvar</button>
            </div>    
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>