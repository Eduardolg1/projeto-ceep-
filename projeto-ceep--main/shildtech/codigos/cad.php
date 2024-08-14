<?php
if(isset($_POST['submit']))
{
include_once('conexao.php');
$codtpessoa = $_POST['codtpessoa'];
$nome =$_POST['nome'];
$telefone =$_POST['telefone'];
$email =$_POST['email'];
$senha =$_POST['senha'];
$rua =$_POST['rua'];
$cidade =$_POST['cidade'];
$numerocasa =$_POST['numerocasa'];
$bairro =$_POST['bairro'];


$result = mysqli_query($con,"INSERT INTO pessoa(cod_tipo_pessoa, nome, telefone, email, senha, rua, cidade, numero_casa, bairro) 
VALUES ('$codtpessoa','$nome','$telefone','$email','$senha','$rua','$cidade','$numerocasa','$bairro')");

echo('cadastrado com sucesso: ');
header("location:http://localhost/projeto-ceep--main/shildtech/codigos/Login.php");
}?>