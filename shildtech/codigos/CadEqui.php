<?php
if(isset($_POST['submit']))
{
include_once('conexao.php');
$cod_equipamentos   = $_POST['cod_equipamentos'];
$cod_pessoa =$_POST['cod_pessoa'];
$tipo =$_POST['tipo'];
$processador =$_POST['processador'];
$ram =$_POST['ram'];
$marca =$_POST['marca'];
$modelo =$_POST['modelo'];
$armazenamento =$_POST['armazenamento'];


$result = mysqli_query($con,"INSERT INTO equipamentos(cod_equipamentos, cod_pessoa, tipo, processador, ram, marca, modelo, armazenamento) 
VALUES ('$cod_equipamentos','$cod_pessoa','$tipo','$email','$processador','$ram','$marca','$modelo','$armazenamento')");

echo('cadastrado com sucesso: ');
}?>