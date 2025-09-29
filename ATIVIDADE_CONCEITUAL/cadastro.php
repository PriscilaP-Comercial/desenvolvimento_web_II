<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Manipulação de Dados em PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form name="cadastro.php" method="post" action="gravar.php">
    <fieldset>
      <legend>CADASTRO DE CLIENTES</legend>
      
      <div class="campo full">
        <label for="txt_cpf">CPF do Cliente</label>
        <input type="text" id="txt_cpf" name="txt_cpf">
      </div>
      
      <div class="campo">
        <label for="txt_nome">Nome do Cliente</label>
        <input type="text" id="txt_nome" name="txt_nome" required>
      </div>
      
      <div class="campo">
        <label for="txt_data_nasc">Data de Nascimento</label>
        <input type="date" id="txt_data_nasc" name="txt_data_nasc" required>
      </div>
      
      <div class="campo">
        <label for="txt_endereco">Endereço</label>
        <input type="text" id="txt_endereco" name="txt_endereco" required>
      </div>
      
      <div class="campo">
        <label for="txt_n_comp">N° / Complemento</label>
        <input type="text" id="txt_n_comp" name="txt_n_comp">
      </div>
      
      <div class="linha-agrupada">
        <div class="campo">
          <label for="txt_bairro">Bairro</label>
          <input type="text" id="txt_bairro" name="txt_bairro">
        </div>
        
        <div class="campo">
          <label for="txt_cidade">Cidade</label>
          <input type="text" id="txt_cidade" name="txt_cidade" required>
        </div>
        
        <div class="campo uf">
          <label for="txt_uf">UF</label>
          <input type="text" id="txt_uf" name="txt_uf" maxlength="2" required>
        </div>
      </div>
      
      <div class="campo">
        <label for="txt_fone">Telefone Contato</label>
        <input type="tel" id="txt_fone" name="txt_fone" required>
      </div>
      
      <div class="campo">
        <label for="txt_e_mail">Email Contato</label>
        <input type="email" id="txt_e_mail" name="txt_e_mail" required>
      </div>
    
      <div class="botoes full">
        <input type="submit" value="Enviar Dados">
        <input type="reset" value="Limpar">
      </div>
    </fieldset>
  </form>
</body>
</html>