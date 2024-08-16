<?php
    $host = "localhost";
    $bd = "shildtech";
    $usuario = "root";
    $senha = "";

    $con = mysqli_connect($host, $usuario, $senha, $bd);
   
    if ($con->connect_error) {
        die("Conexão falhou: " . $con->connect_error);
    }
    //$mysqli = new mysqli($host, $usuario, $senha, $bd);

    
?>