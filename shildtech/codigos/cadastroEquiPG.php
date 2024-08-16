<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de equipamentos - Suporte Técnico</title>
    <link rel="stylesheet" href="../Css/Login.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastro de equipamentos</h2>
        <form action="index.php" method="POST">
       
            <div class="form-group">
                <input type="text" id="cod_equipamentos" name="cod_equipamentos" placeholder=" " required>
                <label for="cod_equipamentos">Codigo do equipamento</label>
            </div>
            <div class="form-group">
                <input type="text" id="cod_pessoa" name="cod_pessoa" placeholder=" " required>
                <label for="cod_pessoa">Codigo da pessoa</label>
            </div>
            <div class="form-group">
                <input type="text" id="tipo" name="tipo" placeholder=" " required>
                <label for="tipo">tipo</label>
            </div>
            <div class="form-group">
                <input type="text" id="processador" name="processador" placeholder=" " required>
                <label for="tipo">processador</label>
            </div>
            <div class="form-group">
                <input type="text" id="ram" name="ram" placeholder=" " required>
                <label for="tipo">memoria ram</label>
            </div>
            <div class="form-group">
                <input type="text" id="marca" name="marca" placeholder=" " required>
                <label for="tipo">marca do aparelho</label>
            </div>
            <div class="form-group">
                <input type="text" id="modelo" name="modelo" placeholder=" " required>
                <label for="modelo">modelo do aparelho</label>
            </div>
            <div class="form-group">
                <input type="text" id="armazenamento" name="armazenamento" placeholder=" " required>
                <label for="armazenamento">marca do computador</label>
            </div>
            <div class="hs-button">
            <input type="submit" name="submit" id="submit">
            </div>    
        </form>
    </div>
</body>
</html>
