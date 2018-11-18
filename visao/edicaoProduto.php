<!DOCTYPE html> 
<html> 
<head> 
    <title>Cadastro de Produtos</title> 
    <meta charset="UTF-8">  
</head> 
<body> 
<?php 
include_once("../acessodados/acessodados.php"); 
include_once("../controle/controleproduto.php"); 
selecionaOpcao(); 
$id_opr = @$_REQUEST["id_opr"]; 
$id_produto = @$_REQUEST["id_produto"]; 
$nome = @$_REQUEST["nome"]; 
$id_categoria  = @$_REQUEST["id_categoria"]; 
$valor_compra  = @$_REQUEST["valor_compra"]; 
$valor_venda = @$_REQUEST["valor_venda"]; 
?> 
<form action="operacoes.php" method="post"> 
<input type="hidden" name="id_produto" value="<?php echo $id_produto?>"> 
<fieldset> 
<legend>Dados do Produto</legend> 
<table border="0" align="center"> 
    <tr> 
        <td class="rotulos">Produto: </td> 
        <td> 
            <input type="text" name="nome" size="20" maxlength="30"  
                class="edit" value="<?php echo $nome?>"> 
        </td> 
    </tr> 
    <tr> 
        <td class="rotulos">Categoria: </td> 
        <td> 
            <select name="id_categoria" class="edit"> 
                <option value="">Selecione</option> 
                <?php  
                $result = select("tb_categoria", "*", null, "id_categoria"); 
                while($linha = camposRegistro($result)){ 
                    echo "<option value=\"" . $linha["id_categoria"]."\">" . $linha["tb_categoriacol"] . "</option>"; 
                }?> 
            </select> 
        </td> 
    </tr> 
    <tr> 
        <td class="rotulos">Preço de venda: </td> 
        <td> 
            <input type="text" name="valor_venda" size="10" maxlength="10"  
                class="edit" value="<?php echo $valor_venda?>"> 
        </td> 
    </tr> 
    <tr> 
        <td class="rotulos">Preço de compra: </td> 
        <td> 
            <input type="text" name="valor_compra" size="10" maxlength="10"  
                class="edit" value="<?php echo $valor_compra?>"> 
        </td> 
    </tr> 
    <tr align="center"> 
        <td colspan="2"> 
            <?php 
            switch ($id_opr){ 
                case 1: 
                    echo "<input type=\"submit\" name=\"acao\" class=\"botoes\" value=\"Incluir\">"; 
                    break; 
                case 2: 
                    echo "<input type=\"submit\" name=\"acao\" class=\"botoes\" value=\"Salvar\">"; 
                    break; 
                case 3: 
                    echo "<input type=\"submit\" name=\"acao\" class=\"botoes\" value=\"Excluir\">"; 
                    break; 
            }?> 
            <input type="button" name="acao"  class="botoes" value="Voltar"  
                    onclick="self.location.href='index.php'"> 
        </td> 
    </tr> 
</table> 
</fieldset> 
</form> 
</html>