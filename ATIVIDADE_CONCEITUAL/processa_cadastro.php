<?php
include 'conexao.php';

if (isset($_POST['bt_verificar'])) {
    $usuario = $_POST["txt_usuario"]; 
    $e_mail = $_POST["txt_e_mail"];
    $senha = $_POST["txt_senha"];
    $confSenha = $_POST["conf_senha"];

    if ($senha !== $confSenha) {
        echo "<center>";
        echo "<hr> As senhas não conferem!<br>";
        echo "<a href='cadastrar_usuario.php'>Voltar e tentar novamente</a><hr>";
        echo "</center>";
        exit;
    }

    if (strlen($senha) < 6) {
        echo "<center>";
        echo "<hr> A senha deve ter pelo menos 6 caracteres!<br>";
        echo "<a href='cadastrar_usuario.php'>Voltar e tentar novamente</a><hr>";
        echo "</center>";
        exit;
    }

    $sql_verifica = mysqli_query($conecta_db, "SELECT * FROM tb_login 
                                WHERE usuario = '$usuario' OR e_mail = '$e_mail'");

    if (mysqli_num_rows($sql_verifica) > 0) {
        echo "<center>";
        echo "<hr> CONTA JA EXISTE!<br>";
        echo "<a href='cadastrar_usuario.php'>Voltar e tentar novamente</a><hr>";
        echo "</center>";
    } else {
        $sql_insere = mysqli_query($conecta_db, "INSERT INTO tb_login (usuario, e_mail, senha) 
                                  VALUES ('$usuario', '$e_mail', '$senha')");
        
        if ($sql_insere) {
            echo "<center>";
            echo "<hr> CONTA CRIADA COM SUCESSO!<br>";
            echo "<a href='login.php'>Ir para Login</a><hr>";
            echo "</center>";
        } else {
            echo "<center>";
            echo "<hr> ERRO AO CRIAR CONTA: " . mysqli_error($conecta_db) . "<br>";
            echo "<a href='cadastrar_usuario.php'>Voltar e tentar novamente</a><hr>";
            echo "</center>";
        }
    }
} else {
    echo "<center>";
    echo "<hr> ACESSO NAO AUTORIZADO!<br>";
    echo "<a href='cadastrar_usuario.php'>Voltar para Cadastro</a><hr>";
    echo "</center>";
}
?>