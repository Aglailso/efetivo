<?php 

    //Para não exibir mensagem de alerta
    error_reporting(1);

   // Importar conexão com banco de dados
    include('config/conexao.php');

    //Filtro começa vazio
     $filtro_sql = ""  ;

    //Clicou em filtrar
    if ( $_POST != NULL) {

    //Obtem filtro digitado pelo usuario
    $filtro = $_POST["filtro"];
    $filtro2 = $_POST["filtro2"];
    $filtro3 = $_POST["filtro3"];
    $filtro4 = $_POST["filtro4"];
    $filtro5 = $_POST["filtro5"];
    $filtro6 = $_POST["filtro6"];

    //Cria filtro em sql
    $filtro_sql = " WHERE id='$filtro' 
                    OR placa LIKE '%$filtro%' OR chassi LIKE '%$filtro%' AND modelo LIKE '%$filtro2%'
                            AND motorista_operador LIKE '%$filtro3%' AND status LIKE '%$filtro4%' AND canteiro LIKE '%$filtro5%' AND tipo LIKE '%$filtro6%'";
}

 ?>
 
<div class="cabecalho">
    

     <div class="col-7 mt-2">
     <img src="img/logo.png" id="logo" style="width:90px">
      <a href="excel/gerar_excel_veiculos.php" class="btn btn-outline-success btn-sm">Baixar em Excel Xls</a>
      <a href="view/historico.php" class="btn btn-outline-info btn-sm">Histórico</a>
     <h3 class="tituloprincipal">Veículos Próprios</h3>
  </div>

 </div><br><br>

  <div class="principal">

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Controle</title>
</head>

                   
                       
               
     
    <form method="POST">

                    <input style="width:100px" type="text" name="filtro" placeholder="Placa, Chassi" value="<?php echo $_POST["filtro"]; ?>">
                    <input style="width:150px" type="text" name="filtro2" placeholder="Modelo" value="<?php echo $_POST["filtro2"]; ?>">
                    <input type="text" name="filtro3" placeholder="Motorista" value="<?php echo $_POST["filtro3"]; ?>">
                    <input style="width:95px" type="text" name="filtro4" placeholder="Status" value="<?php echo $_POST["filtro4"]; ?>">
                    <input type="text" name="filtro5" placeholder="Canteiro" value="<?php echo $_POST["filtro5"]; ?>">
                    <input style="width:120px" type="text" name="filtro6" placeholder="Tipo Veic/Equip." value="<?php echo $_POST["filtro6"]; ?>">
                    <input type="submit" value="ok" class="btn btn-outline-primary btn-sm"><br><br>
                </form>
                

    
        
        <table class="table table-hover table-sm table-bordered table-fixed" id="table" >
                 
        	<thead id="thead" class="titolotabela table-dark">
            <th style="width:40px">Cód.</th>
            <th style="width:95px">Placa</th>
            <th style="width:400px">Modelo</th>
            <!-- <th style="width:95px">Ano</th> -->
            <!-- <th style="width:110px">Chassi</th> -->
            <th style="width:200px">Motorista</th>
            <th style="width:80px">C. Custo</th>
            <!-- <th>atividade</th> -->
            <th style="width:100px">Status</th>
            <!-- <th>projeto</th> -->
            <th style="width:150px">Canteiro</th>
            <!-- <th>tipo</th> -->
            <!-- <th>frota</th> -->
            <!-- <th>obs</th> -->
            <th style="width:80px">Ações</th>

</thead>
<tbody>
    <?php 
        
        $sql="select * from veiculos $filtro_sql  order by id DESC";
        $resultado= mysqli_query($con, $sql);
        while($dados = mysqli_fetch_assoc($resultado)) {
        ?>  

            <tr>
                <td style="width:40px"><?php  echo $dados['id'] ?></td>
                <td style="width:95px"><?php  echo $dados['placa'] ?></td>
                <td style="width:400px"><?php  echo $dados['modelo'] ?></td>
                <!-- <td style="width:95px"><?php  echo $dados['ano'] ?></td> -->
                <!-- <td style="width:120px"><?php  echo $dados['chassi'] ?></td> -->
                <td style="width:200px"><?php  echo $dados['motorista_operador'] ?></td>
                <td style="width:80px"><?php  echo $dados['c_custo'] ?></td>
                <!-- <td><?php  echo $dados['atividade'] ?></td> -->
                <td style="width:100px"><?php  echo $dados['status'] ?></td>
                <!-- <td><?php  echo $dados['projeto'] ?></td> -->
                <td style="width:150px"><?php  echo $dados['canteiro'] ?></td>
                <!-- <td><?php  echo $dados['tipo'] ?></td> -->
                <!-- <td><?php  echo $dados['frota'] ?></td> -->
                <!-- <td><?php  echo $dados['obs'] ?></td> -->
                <td style="width:40px" class="botao">
                <a href="view/ver_veiculos.php?id=<?php echo $dados['id'] ?>"class="link-dark"><i class="bi bi-eye-fill mx-2" id="icone"></i></a> 
                  </td>
                  <td>
                <a href="form/editar_veiculos.php?id=<?php echo $dados['id'] ?>"class="link-dark"><i class="bi bi-pencil mx-2" id="icone"></i></a>
                </td>
                <!-- <a href="excluir?id=<?php echo $dados['id'] ?>"class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i>Excluir</a> -->

                
            </tr>
            
            <?php                   
        }
        
?>
       </tbody>     
    </table>
    <div class="row mx-2">
    <div class="col-2">
        <?php
                    $total = 0;
                    $n = 1;
                    $sql = "SELECT * from veiculos $filtro_sql";
                    $sql = $con->query($sql);
                    $total = $sql->num_rows;

                    echo 'Total: <b>'.$total.'</b>';

                     ?>
</div>


    <div class="col-4">
    
                 <?php
                    $totalativo = 0;
                    $n = 1;
                    $sql = "SELECT * from veiculos where status='ATIVO' ";
                    $sql = $con->query($sql);
                    $totalativo = $sql->num_rows;

                    echo 'Ativo: <b>'.$totalativo.'</b>';

                     ?> 
    </div>
     <div class="col-4">

                 <?php
                    $totalmanutencao = 0;
                    $n = 1;
                    $sql = "SELECT * from veiculos where status='MANUTENÇÃO' ";
                    $sql = $con->query($sql);
                    $totalmanutencao = $sql->num_rows;

                    echo 'Manutenção: <b>'.$totalmanutencao.'</b>';

                     ?>

                    
                     </div>
                     </div>

    
</html>
</div>
<div class="secundario">
  <h3 class="tituloprincipal">Manutenção</h3>
   <!-- <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#novoModal_cadManutencaoll">Manutenção</button> -->
   <!-- <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#novoModal_sairManutencao">Sair da Manutenção</button> -->
   <a href="form/cad_vriculos_manutencao.php" class="btn btn-outline-warning btn-sm">Manutenção</a><br><br>
   <table class="table table-hover table-sm table-bordered table-fixed " id="table" >
                 
        	<thead id="thead" class="table-dark">
            <!-- <th style="width:40px">Item.</th> -->
            <th style="width:40px">Cód.</th>
            <th style="width:70px">placa.</th>
            <th style="width:150px">modelo.</th>
            <!-- <th style="width:95px">status</th> -->
            <th style="width:150px">oficina</th>
            <th style="width:130px">cidade</th>
            <th style="width:75px">data_entrada</th>
            <th>Ações</th>
            
            </thead>
            <tbody>
                <?php 
        
                $sql="select * from vw_hist_manutencao  order by id_m DESC limit 20";
                $resultado= mysqli_query($con, $sql);
                while($dados = mysqli_fetch_assoc($resultado)) {
                ?>  

                    <tr>
                        <!-- <td style="width:40px"><?php  echo $dados['id_m'] ?></td> -->
                        <td style="width:40px"><?php  echo $dados['id'] ?></td>
                        <td style="width:70px"><?php  echo $dados['placa'] ?></td>
                        <td style="width:150px"><?php  echo $dados['modelo'] ?></td>
                        <!-- <td style="width:95px"><?php  echo $dados['status'] ?></td> -->
                        <td style="width:150px"><?php  echo $dados['oficina'] ?></td>
                        <td style="width:130px"><?php  echo $dados['cidade'] ?></td>
                        <td style="width:75px"><?php  echo $dados['data_entrada'] ?></td>
                        <td style="width:40px">   
                        <a href="form/editar_veiculos_manutenção.php?id_m=<?php echo $dados['id_m'] ?>"class="link-dark"><i class="bi bi-pencil mx-2"></i></a>
                        
                        </td>
                    </tr>
                    
                    <?php                   
        }
        
?>
       </tbody>     
    </table>
    
                    <?php
                    $totalmanutencao2 = 0;
                    $n = 1;
                    $sqlmanut = "SELECT * from historico_manutencao_veiculo where status='MANUTENÇÃO' ";
                    $sqlmanut = $con->query($sqlmanut);
                    $totalmanutencao2 = $sqlmanut->num_rows;

                    echo 'Manutenção: <b>'.$totalmanutencao2.'</b>';

                     ?>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>