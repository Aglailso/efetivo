<?php 
include('../config/conexao.php');



if ($_POST != NULL) {

  //Obtem os dados digitados pelo usuario
  $id = addslashes($_POST["id"]);
  $status = addslashes($_POST["status"]);
  $oficina = addslashes($_POST["oficina"]);
  $cidade = addslashes($_POST["cidade"]);
  $data_entrada = addslashes($_POST["data_entrada"]);
  $data_saida = addslashes($_POST["data_saida"]);
  $obs = addslashes($_POST["obs"]);
  

  
   $sql = "INSERT INTO historico_manutencao_veiculo (id, status, oficina, cidade, data_entrada, data_saida, obs) VALUES ('$id', '$status', '$oficina', '$cidade', '$data_entrada', '$data_saida', '$obs')";
   $result = mysqli_query($con, $sql);
  
      

        //Atualizou?
        if ($result == true) {
          echo "<script>
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
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar veiculo em Manutenção</title>
</head>
<body>

	 <div class="container">
	 		<h3 class="titulo mx-5">Manutenção</h3>
      <div>
        <a href="../index.php" class="btn btn-outline-secondary">Voltar</a><br><br>
      </div>
			<form action="" method="POST">
            <div class="row mb-3 g-3">
            <div class="col-3">
            
            <?php  	
     				$sql_carregaprod = "SELECT id, placa FROM veiculos order by placa ASC";
     				$sql_carregaprod = $con->query($sql_carregaprod) or die($con->error);
 						?>	
 						<label>Placa</label>
 						<select  class="form-control select2" required name="id">
 						<option value="">Selecione a Placa</option>
 						<?php while ($produto = $sql_carregaprod->fetch_assoc()) { ?>
 						<option value="<?php echo $produto['id']; ?>"><?php echo $produto['placa']; ?></option>

 						<?php } ?>	 
 						</select>

            <!-- <input class="form-control" type="text" name="id" required> -->
            </div>
            <div class="col-4">
            <label>Status</label>
            <input class="form-control" type="text" name="status" value="MANUTENÇÃO" required><br>
						</select>
            </div>
            </div>

            <div class="row mb-3 g-3">
            <div class="col-4">
            <label>Oficina</label>
            <input class="form-control" type="text" name="oficina" required><br>
            </div>
            <div class="col-4">
            <label>Cidade</label>
            <input class="form-control" type="text" name="cidade" required><br>
            </div>
            </div>

            <div class="row mb-3 g-3">
            <div class="col-2">
            <label>Data Entrada</label>
            <input class="form-control" type="date" name="data_entrada" required><br>
            </div>
            <div class="col-2">
            <label>Data Saida</label>
            <input class="form-control" type="date" name="data_saida" ><br>
            </div>
            </div>
            
            <div class="row mb-3 g-3">
            <div class="col-8">
            <label>Obs</label>
            <input class="form-control" type="text" name="obs"><br>
            </div>
            </div>
            

            <div>  
              <button type="submit" class="btn btn-outline-success">Salvar</button>
            </div>    
        </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
	      $(document).ready(function() {
       	$('.select2').select2();
		    });
      </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>