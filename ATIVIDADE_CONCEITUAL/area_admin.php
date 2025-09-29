<?php
include 'conexao.php';

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$senha = isset($_POST["txt_senha"]) ? $_POST["txt_senha"] : "";

if ($login != "" && $senha != "") {
    $sql = mysqli_query($conecta_db, "SELECT * FROM tb_login 
                                      WHERE (usuario = '$login' OR e_mail = '$login') 
                                      AND senha = '$senha'");

    if (!$sql) {
        die("Erro na consulta: " . mysqli_error($conecta_db));
    }

    if (mysqli_num_rows($sql) > 0) {
        header("Location: listagem.php");
        exit();
    } else {
        echo "<center>";
        echo "<hr>CONTA INVALIDA!<hr>";
        echo "<br><br><a href='cadastrar_usuario.php'>CADASTRAR NOVA CONTA</a>";
        echo "</center>";
    }
} else {
    echo "<center>";
    echo "<hr>Preencha login e senha!<hr>";
    echo "<br><br><a href='login.php'>Voltar para Login</a>";
    echo "</center>";
}
?>