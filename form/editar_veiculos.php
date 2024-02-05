<?php 
include('../config/conexao.php');

$id = $_GET["id"];

if (isset($_POST["submit"])) {
	$placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
		$chassi = $_POST['chassi'];
		$motorista_operador = $_POST['motorista_operador'];
		$c_custo = $_POST['c_custo'];
		$atividade = $_POST['atividade'];
		$status = $_POST['status'];
		$projeto = $_POST['projeto'];
		$canteiro = $_POST['canteiro'];
		$tipo = $_POST['tipo'];
		$obs = $_POST['obs'];
 

 
	$sql = "UPDATE veiculos SET placa = '$placa', modelo = '$modelo', ano = '$ano', chassi = '$chassi', motorista_operador = '$motorista_operador', c_custo = '$c_custo', atividade = '$atividade', status = '$status', projeto = '$projeto', canteiro = '$canteiro', tipo = '$tipo', obs = '$obs' WHERE id = $id";
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

	<a href="../index.php" class="btn btn-primary">Voltar</a><br><br>
     </div>

     <?php
    $sql = "SELECT * FROM veiculos WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

	<form  method="POST" id="form_editar">
	 
		<div class="row mb-3 g-3">
		<div class="col-2">
		<label>Placa</label>
		<input class="form-control" type="text" name="placa" value="<?php echo $row['placa'] ?>" required>
		</div>
		<div class="col-6">
		<label>Modelo</label>
		<input class="form-control" type="text" name="modelo" value="<?php echo $row['modelo'] ?>" required>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-2">
		<label>Ano</label>
		<input class="form-control" type="text" name="ano" value="<?php echo $row['ano'] ?>" required><br>
		</div>
		<div class="col-6">
		<label>Chassi</label>
		<input class="form-control" type="text" name="chassi" value="<?php echo $row['chassi'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-5">
		<label>Motorista</label>
		<input class="form-control" type="text" name="motorista_operador" value="<?php echo $row['motorista_operador'] ?>" required><br>
		</div>
		<div class="col-3">
		<label>C. Custo</label>
		<input class="form-control" type="text" name="c_custo" value="<?php echo $row['c_custo'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-5">
		<label>Atividade</label>
		<input class="form-control" type="text" name="atividade" value="<?php echo $row['atividade'] ?>" required><br>
		</div>
		<div class="col-3">
		<label>Status</label>
		<input class="form-control" type="text" name="status" value="<?php echo $row['status'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-5">
		<label>Projeto</label>
		<input class="form-control" type="text" name="projeto" value="<?php echo $row['projeto'] ?>" required><br>
		</div>
		<div class="col-3">
		<label>Canteiro</label>
		<input class="form-control" type="text" name="canteiro" value="<?php echo $row['canteiro'] ?>" required><br>
		</div>
		</div>

		<div class="row mb-3 g-3">
		<div class="col-2">
		<label>Tipo</label>
		<input class="form-control" type="text" name="tipo" value="<?php echo $row['tipo'] ?>" required><br>
		</div>
		<div class="col-5">
		<label>Obs</label>
		<input class="form-control" type="text" name="obs" value="<?php echo $row['obs'] ?>"><br>
		</div>
		</div>
		<br><br>
		<button type="submit" class="btn btn-success" name="submit">Salvar</button>

		
	</form>
</body>
	</div>
</html>