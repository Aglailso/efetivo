<?php 

    $servidor="localhost";
    $usuario="dudu";
    $senha = "123";
    $banco = "agsarq44_efetivo";

     $con = new mysqli($servidor, $usuario, $senha, $banco);
    if($con->connect_errno){
        die("Falha na conex達o com banco");
    }


?>
