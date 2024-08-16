<?php
include_once('conexao.php');

// ** Criar (Create) **
if(isset($_POST['create'])) {
    $codtpessoa = $_POST['codtpessoa'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $numerocasa = $_POST['numerocasa'];
    $bairro = $_POST['bairro'];

    $stmt = $con->prepare("INSERT INTO pessoa (cod_tipo_pessoa, nome, telefone, email, senha, rua, cidade, numero_casa, bairro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $codtpessoa, $nome, $telefone, $email, $senha, $rua, $cidade, $numerocasa, $bairro);

    if($stmt->execute()) {
        echo '<p>Cadastrado com sucesso</p>';
    } else {
        echo '<p>Erro: ' . htmlspecialchars($stmt->error) . '</p>';
    }

    $stmt->close();
}

// ** Atualizar (Update) **
if(isset($_POST['update'])) {
    $old_email = $_POST['old_email'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $numerocasa = $_POST['numerocasa'];
    $bairro = $_POST['bairro'];

    $stmt = $con->prepare("UPDATE pessoa SET nome=?, telefone=?, email=?, senha=?, rua=?, cidade=?, numero_casa=?, bairro=? WHERE email=?");
    $stmt->bind_param("sssssssss", $nome, $telefone, $email, $senha, $rua, $cidade, $numerocasa, $bairro, $old_email);

    if($stmt->execute()) {
        echo '<p>Atualizado com sucesso</p>';
    } else {
        echo '<p>Erro: ' . htmlspecialchars($stmt->error) . '</p>';
    }

    $stmt->close();
}

// ** Deletar (Delete) **
if(isset($_GET['delete'])) {
    $email = $_GET['delete'];

    $stmt = $con->prepare("DELETE FROM pessoa WHERE email=?");
    $stmt->bind_param("s", $email);

    if($stmt->execute()) {
        echo '<p>Deletado com sucesso</p>';
    } else {
        echo '<p>Erro: ' . htmlspecialchars($stmt->error) . '</p>';
    }

    $stmt->close();
}

// ** Ler (Read) **
$result = $con->query("SELECT * FROM pessoa");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pessoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        button {
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>CRUD Pessoa</h1>

    <!-- Formulário de Criação (Create Form) -->
    <h2>Cadastrar Nova Pessoa</h2>
    <form action="crud.php" method="POST">
        <label for="codtpessoa">Código Tipo Pessoa:</label>
        <input type="text" id="codtpessoa" name="codtpessoa" required><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" required><br>
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br>
        <label for="numerocasa">Número da Casa:</label>
        <input type="text" id="numerocasa" name="numerocasa" required><br>
        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br>
        <input type="submit" name="create" value="Cadastrar">
    </form>

    <!-- Tabela de pessoas -->
    <h2>Lista de Pessoas</h2>
    <table>
        <thead>
            <tr>
                <th>Código Tipo Pessoa</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Rua</th>
                <th>Cidade</th>
                <th>Número da Casa</th>
                <th>Bairro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['cod_tipo_pessoa']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['senha']); ?></td>
                    <td><?php echo htmlspecialchars($row['rua']); ?></td>
                    <td><?php echo htmlspecialchars($row['cidade']); ?></td>
                    <td><?php echo htmlspecialchars($row['numero_casa']); ?></td>
                    <td><?php echo htmlspecialchars($row['bairro']); ?></td>
                    <td>
                        <a href="crud.php?edit=<?php echo urlencode($row['email']); ?>">
                            <button type="button">Editar</button>
                        </a>
                        <a href="crud.php?delete=<?php echo urlencode($row['email']); ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                            <button type="button">Deletar</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // ** Formulário de Edição (Edit Form) **
    if(isset($_GET['edit'])) {
        $email = $_GET['edit'];

        $stmt = $con->prepare("SELECT * FROM pessoa WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    ?>
        <h2>Editar Pessoa</h2>
        <form action="crud.php" method="POST">
            <input type="hidden" name="old_email" value="<?php echo htmlspecialchars($row['email']); ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required><br>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($row['telefone']); ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="<?php echo htmlspecialchars($row['senha']); ?>" required><br>
            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($row['rua']); ?>" required><br>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($row['cidade']); ?>" required><br>
            <label for="numerocasa">Número da Casa:</label>
            <input type="text" id="numerocasa" name="numerocasa" value="<?php echo htmlspecialchars($row['numero_casa']); ?>" required><br>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($row['bairro']); ?>" required><br>
            <input type="submit" name="update" value="Atualizar">
        </form>
    <?php
    $stmt->close();
    }
    ?>

</body>
</html>

<?php
$con->close();
?>
