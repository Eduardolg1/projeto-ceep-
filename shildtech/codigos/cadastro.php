<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Suporte Técnico</title>
    <link rel="stylesheet" href="../Css/Login.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastro</h2>
        <form action="/cadastro" method="POST">
            <div class="form-group">
                <input type="text" id="nome" name="nome" placeholder=" " required>
                <label for="nome">Nome</label>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="form-group">
                <input type="password" id="senha" name="senha" placeholder=" " required>
                <label for="senha">Senha</label>
            </div>            
            <div class="form-group">
                <input type="text" id="cidade" name="cidade"  placeholder=" " required>
                <label for="cidade">Cidade</label>
            </div>
            <div class="form-group">
                <input type="text" id="Endereço" name="Endereço"  placeholder=" " required>
                <label for="Endereço">Endereço</label>
            </div>

                <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>    
        </form>
    </div>
</body>
</html>
