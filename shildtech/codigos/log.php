<?php
if(isset($_POST['submit']))
{
include_once('conexao.php');
$email =$_POST['email'];
$senha =$_POST['senha'];

$result = mysqli_query($con,"INSERT INTO pessoa(email, senha) 
VALUES ('$email','$senha')");

echo('Login concluido: ');
header("location: http://localhost/projeto-ceep--main/shildtech/codigos/index.php");
exit();
}?>