<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Suporte Técnico</title>
    <link rel="stylesheet" href="../Css/Login.css">
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="email" id="email" name="email" required>
                <label for="email">Email:</label>

            </div>
            <div class="form-group">
                <input type="password" id="senha" name="senha" required>
                <label for="senha">Senha:</label>

            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
            <div class="hs-button">
            <a href="cadastro.php"><span>Crie sua conta</span></a></head>
            </div>
        </form>
    </div>
</body>
</html>
