<?php
header('Content-Type: text/html; charset=utf-8');
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = isset($_POST["txt_cpf"]) ? $_POST["txt_cpf"] : "";
    $nome = isset($_POST["txt_nome"]) ? $_POST["txt_nome"] : "";
    $data_nasc = isset($_POST["txt_data_nasc"]) ? $_POST["txt_data_nasc"] : "";
    $endereco = isset($_POST["txt_endereco"]) ? $_POST["txt_endereco"] : "";
    $n_comp = isset($_POST["txt_n_comp"]) ? $_POST["txt_n_comp"] : "";
    $bairro = isset($_POST["txt_bairro"]) ? $_POST["txt_bairro"] : "";
    $cidade = isset($_POST["txt_cidade"]) ? $_POST["txt_cidade"] : "";
    $uf = isset($_POST["txt_uf"]) ? $_POST["txt_uf"] : "";
    $fone = isset($_POST["txt_fone"]) ? $_POST["txt_fone"] : "";
    $email = isset($_POST["txt_e_mail"]) ? $_POST["txt_e_mail"] : ""; 

    
    $stmt = $conecta_db->prepare("SELECT * FROM tb_clientes WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<center>";
        echo "<hr>";
        echo "CONTA EXISTENTE!!!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"cadastro.php\">RETORNAR AO CADASTRO</a>";
    } else {
      
        $stmt = $conecta_db->prepare("INSERT INTO tb_clientes (cpf, nome, data_nasc, endereco, n_comp, bairro, cidade, uf, fone, e_mail) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $cpf, $nome, $data_nasc, $endereco, $n_comp, $bairro, $cidade, $uf, $fone, $email);

        if ($stmt->execute()) {
            echo "<center>";
            echo "<hr>";
            echo "DADOS ENVIADOS COM SUCESSO!!!";
            echo "<hr>";
            echo "<br>";
            echo "<a href=\"cadastro.php\">RETORNAR AO CADASTRO</a>";
        } else {
            echo "<center>";
            echo "<hr>";
            echo "ERRO AO INSERIR: " . $stmt->error;
            echo "<hr>";
        }
    }

    $stmt->close();
    $conecta_db->close();

} else {
    echo "<center><hr>ACESSO INVÁLIDO!<hr></center>";
    echo "<center><br><a href=\"cadastro.php\">RETORNAR AO CADASTRO</a></center>";
    exit();
}
?>
