<?php

	//Para não exibir mensagem de alerta
	error_reporting(1);
   // Importar conexão com banco de dados
	include('../config/conexao.php');
	
	//Peguei o id passado via GET
	$id = $_GET["id"];

	//Criar comando SQL
	$sql = "SELECT * FROM veiculos WHERE id=$id";
 
 	//Executa o comando SQL
	$retorno = $con->query( $sql);

	//Obtem registro do que foi retornado do BD
	$registro = $retorno->fetch_array();

	//Obtem dados do registro
	$placa = $registro["placa"];
	$modelo = $registro["modelo"];
	$ano = $registro["ano"];
	$chassi = $registro["chassi"];
	$motorista_operador = $registro["motorista_operador"];
	$c_custo = $registro["c_custo"];
	$atividade = $registro["atividade"];
	$status = $registro["status"];
	$projeto = $registro["projeto"];
	$canteiro = $registro["canteiro"];
	$tipo = $registro["tipo"];
	$obs = $registro["obs"];


 ?>

<!DOCTYPE html>
<html>
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listar Clientes</title>
</head>

<body>
	<div class="container">
		<div class="item">
	<h1>Visualizar dados do Veículo</h1>

	<a href="../index.php" class="btn btn-primary">Voltar</a><br><br>


	<table class="table table-bordered table-sm">
		<tr>
		<td style="width:20px"><b>Cód</b></td>
		<td><?php  echo $id; ?></td>
		</tr>
		<tr>
		<td><b>Placa</b></td>
		<td><?php  echo $placa; ?></td>
		</tr>
		<tr>
		<td><b>Modelo</b></td>
		<td><?php  echo $modelo; ?></td>
		</tr>
		<tr>
		<td><b>Ano</b></td>
		<td><?php  echo $ano; ?></td>
		</tr>
		<tr>
		<td><b>Chassi</b></td>
		<td><?php  echo $chassi; ?></td>
		</tr>
		<tr>
		<td><b>Motorista</b></td>
		<td><?php  echo $motorista_operador; ?></td>
		</tr>
		<tr>
		<td><b>C. Custo</b></td>
		<td><?php  echo $c_custo; ?></td>
		</tr>
		<tr>
		<td><b>Atividade</b></td>
		<td><?php  echo $atividade; ?></td>
		</tr>
		<tr>
		<td><b>Status</b></td>
		<td><?php  echo $status; ?></td>
		</tr>
		<tr>
		<td><b>Projeto</b></td>
		<td><?php  echo $projeto; ?></td>
		</tr>
		<tr>
		<td><b>Canteiro</b></td>
		<td><?php  echo $canteiro; ?></td>
		</tr>
		<tr>
		<td><b>Tipo</b></td>
		<td><?php  echo $tipo; ?></td>
		</tr>
		<tr>
		<td><b>Obs</b></td>
		<td><?php  echo $obs; ?></td>
		</tr>

	</table>
</body>
 	</div>
</div>
</html>