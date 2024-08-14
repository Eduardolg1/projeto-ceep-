<?php
include_once('conexao.php');

function createPerson($con) {
    if (isset($_POST['action']) &+ $_POST['action'] == 'create_person') {
        $codtpessoa = $_POST['codtpessoa'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $numerocasa = $_POST['numerocasa'];
        $bairro = $_POST['bairro'];

        $stmt = $con->prepare("INSERT INTO pessoa (cod_tipo_pessoa, nome, telefone, email, senha, rua, cidade, numero_casa, bairro) ");
        $stmt->bind_param("isssssss", $codtpessoa, $nome, $telefone, $email, $senha, $rua, $cidade, $numerocasa, $bairro);
        $stmt->execute();
        echo 'Pessoa cadastrada com sucesso!';
    }
}

function updatePerson($con) {
    if (isset($_POST['action']) &+ $_POST['action'] == 'update_person') {
        $id = $_POST['id'];
        $codtpessoa = $_POST['codtpessoa'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $numerocasa = $_POST['numerocasa'];
        $bairro = $_POST['bairro'];

        $stmt = $con->prepare("UPDATE pessoa SET cod_tipo_pessoa = ?, nome = ?, telefone = ?, email = ?, senha = ?, rua = ?, cidade = ?, numero_casa = ?, bairro = ? 
                               WHERE id = ?");
        $stmt->bind_param("isssssssi", $codtpessoa, $nome, $telefone, $email, $senha, $rua, $cidade, $numerocasa, $bairro, $id);
        $stmt->execute();
        echo 'Pessoa atualizada com sucesso!';
    }
}

function deletePerson($con) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete_person' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $con->prepare("DELETE FROM pessoa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo 'Pessoa excluída com sucesso!';
    }
}

function readPersons($con) {
    $result = $con->query("SELECT * FROM pessoa");
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . htmlspecialchars($row['id']) . "<br>";
        echo "Tipo: " . htmlspecialchars($row['cod_tipo_pessoa']) . "<br>";
        echo "Nome: " . htmlspecialchars($row['nome']) . "<br>";
        echo "Telefone: " . htmlspecialchars($row['telefone']) . "<br>";
        echo "Email: " . htmlspecialchars($row['email']) . "<br>";
        echo "Senha: " . htmlspecialchars($row['senha']) . "<br>";
        echo "Rua: " . htmlspecialchars($row['rua']) . "<br>";
        echo "Cidade: " . htmlspecialchars($row['cidade']) . "<br>";
        echo "Número da Casa: " . htmlspecialchars($row['numero_casa']) . "<br>";
        echo "Bairro: " . htmlspecialchars($row['bairro']) . "<br>";
        echo "<hr>";
    }
}

function createEquipment($con) {
    if (isset($_POST['action']) && $_POST['action'] == 'create_equipment') {
        $cod_equipamentos = $_POST['cod_equipamentos'];
        $cod_pessoa = $_POST['cod_pessoa'];
        $tipo = $_POST['tipo'];
        $processador = $_POST['processador'];
        $ram = $_POST['ram'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $armazenamento = $_POST['armazenamento'];

        $stmt = $con->prepare("INSERT INTO equipamentos (cod_equipamentos, cod_pessoa, tipo, processador, ram, marca, modelo, armazenamento) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssss", $cod_equipamentos, $cod_pessoa, $tipo, $processador, $ram, $marca, $modelo, $armazenamento);
        $stmt->execute();
        echo 'Equipamento cadastrado com sucesso!';
    }
}

function updateEquipment($con) {
    if (isset($_POST['action']) && $_POST['action'] == 'update_equipment') {
        $id = $_POST['id'];
        $cod_equipamentos = $_POST['cod_equipamentos'];
        $cod_pessoa = $_POST['cod_pessoa'];
        $tipo = $_POST['tipo'];
        $processador = $_POST['processador'];
        $ram = $_POST['ram'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $armazenamento = $_POST['armazenamento'];

        $stmt = $con->prepare("UPDATE equipamentos SET cod_equipamentos = ?, cod_pessoa = ?, tipo = ?, processador = ?, ram = ?, marca = ?, modelo = ?, armazenamento = ? 
                               WHERE id = ?");
        $stmt->bind_param("iissssssi", $cod_equipamentos, $cod_pessoa, $tipo, $processador, $ram, $marca, $modelo, $armazenamento, $id);
        $stmt->execute();
        echo 'Equipamento atualizado com sucesso!';
    }
}

function deleteEquipment($con) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete_equipment' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $con->prepare("DELETE FROM equipamentos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo 'Equipamento excluído com sucesso!';
    }
}

function readEquipments($con) {
    $result = $con->query("SELECT * FROM equipamentos");
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . htmlspecialchars($row['id']) . "<br>";
        echo "Código Equipamento: " . htmlspecialchars($row['cod_equipamentos']) . "<br>";
        echo "Código Pessoa: " . htmlspecialchars($row['cod_pessoa']) . "<br>";
        echo "Tipo: " . htmlspecialchars($row['tipo']) . "<br>";
        echo "Processador: " . htmlspecialchars($row['processador']) . "<br>";
        echo "RAM: " . htmlspecialchars($row['ram']) . "<br>";
        echo "Marca: " . htmlspecialchars($row['marca']) . "<br>";
        echo "Modelo: " . htmlspecialchars($row['modelo']) . "<br>";
        echo "Armazenamento: " . htmlspecialchars($row['armazenamento']) . "<br>";
        echo "<hr>";
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'create_person') {
        createPerson($con);
    } elseif ($_POST['action'] == 'update_person') {
        updatePerson($con);
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'create_equipment') {
        createEquipment($con);
    } elseif ($_POST['action'] == 'update_equipment') {
        updateEquipment($con);
    }
}
