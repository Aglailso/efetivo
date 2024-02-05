<?php 

    $servidor="localhost"; //arquivos.net.br
    $usuario="dudu";    //agsarq01_dudu
    $senha = "123"; //58349651@Dudu
    $banco = "agsarq44_efetivo";

     $con = new mysqli($servidor, $usuario, $senha, $banco);
    if($con->connect_errno){
        die("Falha na conex達o com banco");
    }


?>