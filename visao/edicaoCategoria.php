<!DOCTYPE html> 
<html> 
<head> 
    <title>Cadastro de Categorias</title> 
    <meta charset="UTF-8">  
</head> 
<body> 
<?php 
include_once("../acessodados/acessodados.php"); 
include_once("../controle/controlecategoria.php"); 
selecionaOpcao(); 
$id_opr = @$_REQUEST["id_opr"]; 
$id_categoria = @$_REQUEST["id_categoria"]; 
$tb_categoriacol = @$_REQUEST["tb_categoriacol"]; 
?> 
<form action="operacoes.php" method="post"> 
<input type="hidden" name="id_categoria" value="<?php echo $id_categoria?>"> 
<fieldset> 
<legend>Dados da Categoria</legend> 
<table border="0" align="center"> 
    <tr> 
        <td class="rotulos">Categoria: </td> 
        <td> 
            <input type="text" name="tb_categoriacol" size="20" maxlength="30"  
                class="edit" value="<?php echo $tb_categoriacol?>"> 
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