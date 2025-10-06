<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="gravar.php">
<fieldset>
<legend>CADASTRO DE FUNCIONÁRIOS</legend>
            
<div class="campo full">
    <label for="txt_n_registro">N° REGISTRO</label>
    <input type="text" id="txt_n_registro" name="txt_n_registro" required>
</div>
            
<div class="campo">
    <label for="txt_nome_funcionario">NOME DO FUNCIONÁRIO</label>
    <input type="text" id="txt_nome_funcionario" name="txt_nome_funcionario" required>
</div>
            
<div class="campo">
   <label for="txt_data_admissao">DATA DE ADMISSÃO</label>
   <input type="date" id="txt_data_admissao" name="txt_data_admissao" required>
</div>

<div class="campo">
    <label for="txt_cargo">CARGO</label>
    <select id="txt_cargo" name="txt_cargo" required>
      <option value="">SELECIONE UM CARGO</option>
      <option value="AJUDANTE GERAL">AJUDANTE GERAL</option>
      <option value="TÉCNICO DE MANUTENÇÃO">TÉCNICO DE MANUTENÇÃO</option>
      <option value="ASSISTENTE ADMINISTRATIVO">ASSISTENTE ADMINISTRATIVO</option>
      <option value="ESTAGIÁRIO">ESTAGIÁRIO</option>
      <option value="AUXILIAR DE PRODUÇÃO">AUXILIAR DE PRODUÇÃO</option>
      <option value="OPERADOR DE EMPILHADEIRA">OPERADOR DE EMPILHADEIRA</option>
    </select>
</div>

<div class="campo">
    <label for="txt_salario_bruto">SALÁRIO BRUTO (R$)</label>
    <input type="text" id="txt_salario_bruto" name="txt_salario_bruto" required
           placeholder="Ex: 1450.00 ou 1450,00">
</div>
<div class="botoes full">
    <input type="submit" value="CADASTRAR">
    <button type="button" onclick="window.location.href='listagem.php'">
      VISUALIZAR DEMONSTRATIVO DE PAGAMENTO
    </button>
</div>
</fieldset>
</form>
</body>
</html>