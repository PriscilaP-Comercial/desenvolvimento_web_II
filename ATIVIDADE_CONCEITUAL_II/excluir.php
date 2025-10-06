<?php
header('Content-Type: text/html; charset=utf-8');
include 'conexao.php'; 

if (isset($_GET['registro'])) {
   
    $apagar_registro = $_GET['registro'];
    
  
    $sql_delete = "DELETE FROM tb_funcionarios WHERE n_registro = '" . $apagar_registro . "'";
    
    if (mysqli_query($conecta_db, $sql_delete)) {
        echo "<br><center><hr>REGISTRO EXCLUÍDO COM SUCESSO!!!<br><br><a href=\"listagem.php\">VOLTAR</a><hr>";
        header("Refresh: 2; url=listagem.php");
        exit;
    } else {
        echo "<br><center><hr>ERRO AO EXCLUIR: " . mysqli_error($conecta_db) . "<hr>";
    }
} else {

    echo "<center><hr>ACESSO INVÁLIDO!<hr></center>";
    echo "<center><br><a href=\"listagem.php\">RETORNAR À LISTAGEM</a></center>";
}

mysqli_close($conecta_db);
?>