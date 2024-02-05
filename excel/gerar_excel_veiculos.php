<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
	session_start();
	include('../config/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Efetivo</title>
	<head>
	<body>
		
		<?php
		
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Efetivo veiculos.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="14" text-align: center >Planilha Veículos Proprios</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>id</b></td>';
		$html .= '<td><b>placa</b></td>';
		$html .= '<td><b>modelo</b></td>';
		$html .= '<td><b>ano</b></td>';
		$html .= '<td><b>chassi</b></td>';
		$html .= '<td><b>motorista_operador</b></td>';
		$html .= '<td><b>c_custo</b></td>';
		$html .= '<td><b>atividade</b></td>';
		$html .= '<td><b>status</b></td>';
		$html .= '<td><b>projeto</b></td>';
		$html .= '<td><b>canteiro</b></td>';
		$html .= '<td><b>tipo</b></td>';
		$html .= '<td><b>frota</b></td>';
		$html .= '<td><b>obs</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT * FROM veiculos";
		$resultado_msg_contatos = mysqli_query($con , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["id"].'</td>';
			$html .= '<td>'.$row_msg_contatos["placa"].'</td>';
			$html .= '<td>'.$row_msg_contatos["modelo"].'</td>';
			$html .= '<td>'.$row_msg_contatos["ano"].'</td>';
			$html .= '<td>'.$row_msg_contatos["chassi"].'</td>';
			$html .= '<td>'.$row_msg_contatos["motorista_operador"].'</td>';
			$html .= '<td>'.$row_msg_contatos["c_custo"].'</td>';
			$html .= '<td>'.$row_msg_contatos["atividade"].'</td>';
			$html .= '<td>'.$row_msg_contatos["status"].'</td>';
			$html .= '<td>'.$row_msg_contatos["projeto"].'</td>';
			$html .= '<td>'.$row_msg_contatos["canteiro"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tipo"].'</td>';
			$html .= '<td>'.$row_msg_contatos["frota"].'</td>';
			$html .= '<td>'.$row_msg_contatos["obs"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>