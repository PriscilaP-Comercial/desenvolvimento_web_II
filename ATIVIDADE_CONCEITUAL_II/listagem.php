<?php
include 'conexao.php'; 

$sql = null; 

if (isset($_POST['busca_nome']) && $_POST['busca_nome'] != '') {
    $busca_nome = $_POST['busca_nome'];
    $sql = mysqli_query($conecta_db, "SELECT * FROM tb_funcionarios WHERE nome_funcionario LIKE '" . $busca_nome . "%' ORDER BY nome_funcionario ASC"); 
} else {

    $sql = mysqli_query($conecta_db, "SELECT * FROM tb_funcionarios ORDER BY nome_funcionario ASC");
}
?>

<html>
<head>
    <meta charset="utf-8"> 
    <title>DEMONSTRATIVO DE RENDIMENTOS MENSAIS</title>
    <style>
        img.icone { width: 20px; height: 20px; cursor: pointer; }
        .busca-container { margin: 20px auto; text-align: center; }
        .busca-container input[type="text"] { width: 200px; padding: 5px; text-align: center; }
        .busca-container input[type="submit"],
        .busca-container button.limpar-btn { 
            padding: 5px 10px; 
            margin-left: 5px;
            cursor: pointer;
            border: 1px solid #180909ff;
            border-radius: 4px;
        }

        .busca-container button.limpar-btn {
            background-color: #f4f4f4; 
        }
        
        table { border-collapse: collapse; width: 75%; }
        th, td { padding: 3px; text-align: center; }
        .botao-inferior {
            margin-top: 10px; 
            padding: 5px 10px;
            font-size: 15px;
        }
    </style>
</head>
<body>
<center>
    <h1>DEMONSTRATIVO DE RENDIMENTOS MENSAIS</h1>
    
    <form name="form1" method="POST" action="listagem.php" class="busca-container">
        <label>DIGITE O NOME DO FUNCIONÁRIO:</label><br>
        
        <input type="text" name="busca_nome" placeholder="Ex: Perecila"
               value="<?php echo isset($busca_nome) ? htmlspecialchars($busca_nome) : ''; ?>">
        
        <input type="submit" value="FILTRAR">

        <button type="button" class="limpar-btn" onclick="window.location.href='listagem.php'">
            LIMPAR
        </button>

    </form>

    <table border="1" align="center">
        <tr>
            <th colspan="8" bgcolor="MediumAquamarine">DADOS DOS FUNCIONÁRIOS</th>
        </tr>
        <tr>
            <th bgcolor="LightGreen">N° REGISTRO</th>
            <th bgcolor="LightGreen">NOME FUNCIONÁRIO</th>
            <th bgcolor="LightGreen">DATA ADMISSÃO</th>
            <th bgcolor="LightGreen">CARGO</th>
            <th bgcolor="LightGreen">SALÁRIO BRUTO</th>
            <th bgcolor="LightGreen">INSS</th>
            <th bgcolor="LightGreen">SALÁRIO LÍQUIDO</th>
            <th bgcolor="LightGreen">APAGAR</th> 
        </tr>

        <?php
        if ($sql && mysqli_num_rows($sql) > 0) {
            while ($linha = mysqli_fetch_assoc($sql)) {
                $salario_bruto_formatado = "R$ " . number_format($linha['salario_bruto'], 2, ',', '.');
                $inss_valor = (float) $linha['inss'];
                $inss_formatado = ($inss_valor == 0.00) ? "Isento" : "R$ " . number_format($inss_valor, 2, ',', '.'); 
                $salario_liquido_formatado = "R$ " . number_format($linha['salario_liquido'], 2, ',', '.');

        ?>
                    <tr>
                        <td><?php echo $linha['n_registro']; ?></td> 
                        <td><?php echo htmlspecialchars($linha['nome_funcionario']); ?></td> 
                        <td><?php echo $linha['data_admissao']; ?></td>
                        <td><?php echo $linha['cargo']; ?></td>
                        <td><?php echo $salario_bruto_formatado; ?></td>
                        <td><?php echo $inss_formatado; ?></td>
                        <td><?php echo $salario_liquido_formatado; ?></td>
                        <td>
                            <a href="excluir.php?registro=<?php echo urlencode($linha['n_registro']); ?>" 
                               onclick="return confirm('Tem certeza que deseja excluir o funcionário Nº <?php echo $linha['n_registro']; ?>?');">
                                <img src="deletar_usuario.png" class="icone" alt="X" title="Excluir (X)">
                            </a>
                        </td>
                    </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='8'>Nenhum registro encontrado.</td></tr>";
        }
        ?>
    </table>
    <br>
    
    <button type="button" class="botao-inferior" onclick="window.location.href='home_funcionarios.php'">
        VOLTAR AO CADASTRO
    </button>
    <br>
</center>
<?php
mysqli_close($conecta_db);
?> 
</body>
</html>