<?php
include 'conexao.php';


if (isset($_POST['busca_nome']) && $_POST['busca_nome'] != '') {
    $busca_nome = $_POST['busca_nome'];
    $sql = mysqli_query($conecta_db, "SELECT * FROM tb_login WHERE usuario LIKE '" . $busca_nome . "%' ORDER BY usuario ASC"); 
} else {
    $sql = mysqli_query($conecta_db, "SELECT * FROM tb_login ORDER BY usuario ASC");
}


if (isset($_GET['apagar'])) {
    $apagar_usuario = $_GET['apagar'];
    $sql_delete = mysqli_query($conecta_db, "DELETE FROM tb_login WHERE usuario = '" . $apagar_usuario . "'");
    echo "<br><center><hr>USUÁRIO EXCLUÍDO COM SUCESSO!!!<br><br><a href=\"listagem.php\">VOLTAR</a><hr>";
    return false;
}


if (isset($_POST['editar_user'])) {
    $usuario_antigo = $_POST['usuario_antigo'];
    $novo_usuario   = $_POST['novo_usuario'];
    $novo_email     = $_POST['novo_email'];
    $nova_senha     = $_POST['nova_senha'];

    $sql_update = mysqli_query($conecta_db, "UPDATE tb_login 
                        SET usuario='$novo_usuario', e_mail='$novo_email', senha='$nova_senha' 
                        WHERE usuario='$usuario_antigo'");

    if ($sql_update) {
        echo "<br><center><hr>USUÁRIO ATUALIZADO COM SUCESSO!!!<br><br><a href=\"listagem.php\">VOLTAR</a><hr>";
        return false;
    } else {
        echo "<br><center><hr>ERRO AO ATUALIZAR: " . mysqli_error($conecta_db) . "<hr>";
    }
}
?>

<html>
<head>
    <meta charset="utf-8"> 
    <style>
        img.icone {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }
        input[type=text], input[type=password] {
            width: 90%;
        }
        .busca-container {
            margin: 20px auto;
            text-align: center;
        }
        .busca-container input[type="text"] {
            width: 200px; /* tamanho do campo */
            padding: 5px;
            text-align: center;
        }
        .busca-container input[type="submit"] {
            padding: 5px 10px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
<center>
    <!-- Formulário de busca centralizado -->
    <form name="form1" method="POST" action="listagem.php" class="busca-container">
        <label>DIGITE UM USUÁRIO:</label><br>
        <input type="text" name="busca_nome">
        <input type="submit" value="FILTRAR">
    </form>

    <table border="1" align="center">
        <tr>
            <th colspan="6" bgcolor="MediumAquamarine">LISTAGEM DE CONTAS</th>
        </tr>
        <tr>
            <th bgcolor="LightGreen">USUÁRIO</th>
            <th bgcolor="LightGreen">EMAIL</th>
            <th bgcolor="LightGreen">SENHA</th>
            <th colspan="2" bgcolor="LightGreen">AÇÃO</th>
        </tr>

        <?php
        if ($sql && mysqli_num_rows($sql) > 0) {
            while ($linha = mysqli_fetch_assoc($sql)) {
                // Se for o usuário que está sendo editado, mostrar formulário
                if (isset($_GET['editar']) && $_GET['editar'] == $linha['usuario']) {
        ?>
                <tr>
                    <form method="POST" action="listagem.php">
                        <td><input type="text" name="novo_usuario" value="<?php echo $linha['usuario']; ?>"></td>
                        <td><input type="text" name="novo_email" value="<?php echo $linha['e_mail']; ?>"></td>
                        <td><input type="password" name="nova_senha" value="<?php echo $linha['senha']; ?>"></td>
                        <td colspan="2">
                            <input type="hidden" name="usuario_antigo" value="<?php echo $linha['usuario']; ?>">
                            <input type="submit" name="editar_user" value="Salvar">
                        </td>
                    </form>
                </tr>
        <?php
                } else {
        ?>
                <tr>
                    <td><?php echo $linha['usuario']; ?></td>
                    <td><?php echo $linha['e_mail']; ?></td>
                    <td><?php echo $linha['senha']; ?></td>
                    <td>
                        <a href="listagem.php?apagar=<?php echo $linha['usuario']; ?>" 
                           onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <img src="deletar_usuario.png" class="icone" alt="Deletar">
                        </a>
                    </td>
                    <td>
                        <a href="listagem.php?editar=<?php echo $linha['usuario']; ?>">
                            <img src="edicao_usuario.png" class="icone" alt="Editar">
                        </a>
                    </td>
                </tr>
        <?php 
                }
            }
        }
        ?>
    </table>
    <br>
    <a href="login.php">RETORNAR AO LOGIN</a>
</center>    
</body>
</html>
