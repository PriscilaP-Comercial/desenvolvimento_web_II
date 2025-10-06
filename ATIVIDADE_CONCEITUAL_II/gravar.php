<?php
header('Content-Type: text/html; charset=utf-8');
include 'conexao.php'; 


define('SALARIO_MINIMO', 1412.00); 
define('LIMITE_INSS', 1550.00);
define('ALIQUOTA_INSS', 0.11);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n_registro          = isset($_POST["txt_n_registro"]) ? $_POST["txt_n_registro"] : "";
    $nome_funcionario    = isset($_POST["txt_nome_funcionario"]) ? $_POST["txt_nome_funcionario"] : "";
    $data_admissao       = isset($_POST["txt_data_admissao"]) ? $_POST["txt_data_admissao"] : "";
    $cargo               = isset($_POST["txt_cargo"]) ? $_POST["txt_cargo"] : "";
    
    $salario_bruto_input = isset($_POST["txt_salario_bruto"]) ? $_POST["txt_salario_bruto"] : ""; 

    $salario_bruto_limpo = str_replace('.', '', $salario_bruto_input);
    $salario_bruto_limpo = str_replace(',', '.', $salario_bruto_limpo);
    $salario_bruto = (float) $salario_bruto_limpo;


    if (empty($n_registro) || empty($nome_funcionario) || empty($data_admissao) || empty($cargo) || empty($salario_bruto_input) || $salario_bruto <= 0) {
        die("<center><hr>ERRO: Todos os campos devem ser preenchidos e o Salário Bruto deve ser um valor válido.<hr><a href=\"home_funcionarios.php\">RETORNAR AO CADASTRO</a></center>");
    }

    $valor_inss = 0.00;
    
    if ($salario_bruto > LIMITE_INSS) {
        $valor_inss = $salario_bruto * ALIQUOTA_INSS;
    } 

    $salario_liquido = $salario_bruto - $valor_inss;
    
    $sql_check = "SELECT n_registro FROM tb_funcionarios WHERE n_registro = '" . $n_registro . "'";
    $resultado = mysqli_query($conecta_db, $sql_check);
    
    if (mysqli_num_rows($resultado) > 0) {

        echo "<center><hr>REGISTRO EXISTENTE! O Nº " . htmlspecialchars($n_registro) . " já foi cadastrado.<hr><br><a href=\"home_funcionarios.php\">RETORNAR AO CADASTRO</a></center>";
    } else {
        
        $sql_insert = "INSERT INTO tb_funcionarios (n_registro, nome_funcionario, data_admissao, cargo, salario_bruto, inss, salario_liquido) 
                             VALUES ('" . $n_registro . "', '" . $nome_funcionario . "', '" . $data_admissao . "', '" . $cargo . "', '" . $salario_bruto . "', '" . $valor_inss . "', '" . $salario_liquido . "')";
        
        if (mysqli_query($conecta_db, $sql_insert)) {
            echo "
                <!DOCTYPE html>
                <html>
                <head><title>Sucesso</title></head>
                <body>
                    <center>
                        <hr>DADOS ENVIADOS COM SUCESSO! (Nº Reg: " . htmlspecialchars($n_registro) . ")<hr><br>
                        Salário Bruto: R$ " . number_format($salario_bruto, 2, ',', '.') . "<br>
                        INSS: R$ " . number_format($valor_inss, 2, ',', '.') . "<br>
                        Salário Líquido: R$ " . number_format($salario_liquido, 2, ',', '.') . "<br>
                        <br>
                        <a href=\"home_funcionarios.php\">RETORNAR AO CADASTRO</a> | 
                        <a href=\"listagem.php\">VISUALIZAR DEMONSTRATIVOS</a>
                    </center>
                </body>
                </html>
            ";
        } else {
            echo "<center><hr>ERRO AO INSERIR: " . mysqli_error($conecta_db) . "<hr></center>";
        }
    }

    mysqli_close($conecta_db);

} else {
    echo "<center><hr>ACESSO INVÁLIDO!<hr></center>";
    echo "<center><br><a href=\"home_funcionarios.php\">RETORNAR AO CADASTRO</a></center>";
    exit();
}
?>