<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form name="form1" method="post" action="processa_cadastro.php">
            <fieldset>
                <legend>CADASTRO DE CONTAS</legend>    

                <div class="campo full">
                    <label for="txt_usuario">Usuário:</label>
                    <input type="text" name="txt_usuario" placeholder="Perecila123" required>
                </div>

                <div class="campo full">
                    <label for="txt_e_mail">E-mail:</label>
                    <input type="email" name="txt_e_mail" placeholder="Perecila@fatec.com.br" required>
                </div>

                <div class="campo full">
                    <label for="txt_senha">Senha:</label>
                    <input type="password" name="txt_senha" placeholder="********" required>
                </div>

                <div class="campo full">
                    <label for="conf_senha">Confirmar Senha:</label>
                    <input type="password" name="conf_senha" placeholder="********" required>
                </div>

                <div class="botoes full">
                    <input type="submit" name="bt_verificar" value="Cadastrar">
                    <input type="submit" value="Login" onclick="window.location.href='login.php'">
                </div>
            </fieldset>
        </form>    
    </div>
</body>
</html>