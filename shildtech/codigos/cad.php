<?php
if(isset($_POST['submit']))
{
include_once('conexao.php');

$nome =$_POST['nome'];
$email =$_POST['email'];
$senha =$_POST['senha'];
$telefone =$_POST['telefone'];
$cidade =$_POST['cidade'];
$endereco =$_POST['endereco'];



$result = mysqli_query($con,"INSERT INTO pessoa(nome, email, senha, telefone, cidade, endereco) values
('$nome','$email','$senha','$telefone','$cidade','$endereco')");

echo('cadastrado com sucesso: ');
}?>