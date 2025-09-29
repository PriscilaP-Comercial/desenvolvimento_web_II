<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <form method="post" action="area_admin.php">
            <fieldset>
                <legend>LOGIN</legend>    
                
                <div class="campo full">
                    <label for="login">Usuário ou Email:</label>
                    <input id="login" type="text" name="login" placeholder="Usuário ou Email" required>
                </div>
                
                <div class="campo full">
                    <label for="txt_senha">Senha:</label>
                    <input id="txt_senha" type="password" name="txt_senha" placeholder="Senha" required>
                </div>
                
                <div class="botoes full">
                    <input type="submit" value="Login">
                </div>
            </fieldset>
        </form>
        
        <form method="get" action="cadastrar_usuario.php">
            <div class="botoes">
                <input type="submit" value="Nova Conta">
            </div>
        </form>
    </div>
</body>
</html>