<?php 
include('../config/conexao.php');

$id_m = $_GET["id_m"];

if (isset($_POST["submit"])) {
	  $id = $_POST['id'];
	  $placa = $_POST['placa'];
    $status = $_POST['status'];
    $oficina = $_POST['oficina'];
		$cidade = $_POST['cidade'];
		$data_entrada = $_POST['data_entrada'];
		$data_saida = $_POST['data_saida'];
		$obs = $_POST['obs'];
 

 
	$sql = "UPDATE historico_manutencao_veiculo SET id = '$id', status = '$status', oficina = '$oficina', cidade = '$cidade', data_entrada = '$data_entrada', data_saida = '$data_saida', obs = '$obs' WHERE id_m = $id_m";
  	$result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: ../index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/Style.css">
	<title>Veículo</title>
</head>

<div class="container mx-auto mt-5" >
<body id="body-cadastro">

     <div id="div_editar">
	 <h1>Editar dados do Veículo</h1>

	<a href="../index.php" class="btn btn-outline-primary">Voltar</a><br><br>
     </div>

     <?php
    $sql = "SELECT * FROM vw_hist_manutencao WHERE id_m = $id_m LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

	<form  method="POST" id="form_editar">
	 
		<div class="row mb-3 g-3">
		<div class="col-2">
		<label>Cód. Veiculo</label>
		<input class="form-control" type="text" name="id" value="<?php echo $row['id'] ?>" required>
		</div>
		
		<div class="col-2">
		<label>Placa</label>
		<input class="form-control" type="text" name="placa" value="<?php echo $row['placa'] ?>" required>
		</div>


		<div class="col-3">
		<label>Status</label>
		<!-- <select class="form-control" value="<?php echo $row['status'] ?>"	>
		<option value="MANUTENÇÃO">MANUTENÇÃO</option>
		<option value="ATIVO">ATIVO</option> -->
		<input class="form-control" type="text" name="status" value="ATIVO" required>
		</select>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-2">
		<label>Oficina</label>
		<input class="form-control" type="text" name="oficina" value="<?php echo $row['oficina'] ?>" required><br>
		</div>
		<div class="col-6">
		<label>Cidade</label>
		<input class="form-control" type="text" name="cidade" value="<?php echo $row['cidade'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-5">
		<label>Data Entrada</label>
		<input class="form-control" type="date" name="data_entrada" value="<?php echo $row['data_entrada'] ?>" required><br>
		</div>
		<div class="col-3">
		<label>Data Saida</label>
		<input class="form-control" type="date" name="data_saida" value="<?php echo $row['data_saida'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-5">
		<label>Obs</label>
		<input class="form-control" type="text" name="obs" value="<?php echo $row['obs'] ?>"><br>
		</div>
		</div>
		
		<br><br>
		<button type="submit" class="btn btn-outline-success" name="submit">Salvar</button>

		
	</form>
</body>
	</div>
</html>