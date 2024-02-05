<?php 

    //Para não exibir mensagem de alerta
    error_reporting(1);

   // Importar conexão com banco de dados
    include('../config/conexao.php');

//Filtro começa vazio
     $filtro_sql = ""  ;

    //Clicou em filtrar
    if ( $_POST != NULL) {

    //Obtem filtro digitado pelo usuario
    $filtro = $_POST["filtro"];
    

    //Cria filtro em sql
    $filtro_sql = " WHERE id='$filtro' 
                    OR placa LIKE '%$filtro%' OR modelo LIKE '%$filtro%' OR chassi LIKE '%$filtro%'";
}


 ?>
<html lang="en">

<div class="col-7 mt-2 mx-5">
     <img src="../img/logo.png" id="logo" style="width:90px">
      <a href="../index.php" class="btn btn-outline-success btn-sm">Voltar</a>
     <h3 class="tituloprincipal">Histórico de Movimentação de Veículos</h3>
  </div>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Histórico</title>
</head>
<body>
                     <form method="POST" class="mx-5">
                        <input style="width:200px" type="text" name="filtro" value="<?php echo $_POST["filtro"]; ?>">
                        <input type="submit" value="ok" class="btn btn-outline-primary btn-sm"><br><br>
                    </form>

            <table class="table table-hover table-sm table-bordered table-fixed mx-5" id="table" >
                 
            <thead id="thead">
            <th style="width:40px">Item.</th>
            <!-- <th style="width:40px">Cód.</th> -->
            <th style="width:70px">Placa</th>
            <th style="width:400px">Modelo</th>
            <th style="width:150px">chassi</th>
            <th style="width:150px">Motorista Anterior</th>
            <th style="width:150px">Motorista Atual</th>
            <th style="width:130px">Canteiro Anterior</th>
            <th style="width:130px">Canteiro Atual</th>
            <th style="width:130px">C. Custo Anterior</th>
            <th style="width:130px">C. Custo Atual</th>
            <th style="width:200px">Aata Atualizacao</th>
                       
            </thead>
            <tbody>
                <?php 
        
                $sql="select id_h, id, placa, chassi, modelo, motorista_anterior, motorista_atual, canteiro_anterior, canteiro_atual,c_custo_anterior, c_custo_atual, DATE_FORMAT(data_atualizacao, '%d/%m/%Y %H:%i:%s') as data_atualizacao from historico $filtro_sql order by id_h DESC";
                $resultado= mysqli_query($con, $sql);
                while($dados = mysqli_fetch_assoc($resultado)) {
                ?>  

                    <tr>
                        <td style="width:40px"><?php  echo $dados['id_h'] ?></td>
                        <!-- <td style="width:40px"><?php  echo $dados['id'] ?></td> -->
                        <td style="width:70px"><?php  echo $dados['placa'] ?></td>
                        <td style="width:400px"><?php  echo $dados['modelo'] ?></td>
                        <td style="width:150px"><?php  echo $dados['chassi'] ?></td>
                        <td style="width:150px"><?php  echo $dados['motorista_anterior'] ?></td>
                        <td style="width:150px"><?php  echo $dados['motorista_atual'] ?></td>
                        <td style="width:130px"><?php  echo $dados['canteiro_anterior'] ?></td>
                        <td style="width:130px"><?php  echo $dados['canteiro_atual'] ?></td>
                        <td style="width:130px"><?php  echo $dados['c_custo_anterior'] ?></td>
                        <td style="width:130px"><?php  echo $dados['c_custo_atual'] ?></td>
                        <td style="width:200px"><?php  echo $dados ['data_atualizacao'] ?></td>
                        
                    </tr>
                    
                    <?php                   
        }
        
?>
       </tbody>     
    </table>
    <div class="row mx-5">
    <div class="col-2">
        <?php
                    $total = 0;
                    $n = 1;
                    $sql = "SELECT * from historico $filtro_sql";
                    $sql = $con->query($sql);
                    $total = $sql->num_rows;

                    echo 'Movimentação: <b>'.$total.'</b>';

                     ?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>