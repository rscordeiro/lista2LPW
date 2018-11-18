<!DOCTYPE html> 
<html> 
<head> 
    <title>Sistema de Cadastro</title> 
    <meta charset="UTF-8"> 
    <!-- <link rel="StyleSheet" type="text/css" href="../css/estilo.css" media="screen" /> -->
</head> 
<body> 
<?php 
include_once("acessodados/acessodados.php"); 
include_once("controle/controlelogin.php"); 
selecionaOpcao();?> 
<form action="index.php" name="frm1" method="post"> 
<?php 
if(empty($_SESSION["id_usuario"])){?> 
    <fieldset> 
    <legend>Tela de Login</legend> 
    <table cellpadding="0" border="0"> 
        <tr> 
            <td>Login:</td> 
            <td valign="top" align="center"> 
                <input type="text" name="tx_login" 
                    value=""  
                    class="edit"> 
            </td> 
        </tr> 
        <tr> 
            <td>Senha:</td> 
            <td valign="top" align="center"> 
                <input type="password" name="tx_senha"  
                    value=""  
                    class="edit"> 
                </td> 
            </tr> 
            <tr> 
                <td colspan="2" align="center"> 
                    <input type="submit" name="acao" value="Acessar" class="botao"> 
                    <input type="button" name="acao" value="Sair" 
                        onclick="window.close()" class="botao"> 
                </td> 
           </tr> 
    </table> 
    </fieldset> 
<?php 
} 
else{ ?> 
    <fieldset> 
    <legend>Opções</legend> 
    <table border="0"width="98%"> 
        <tr> 
            <td width="300px"> 
                <table cellpadding="5" border="0" bgcolor="#D5DFFB"> 
                    <tr> 
                        <th>Menu</th> 
                    </tr> 
                    <tr> 
                        <td width="20%" valign="top"> 
                            <a href="visao/categoria.php">Tipo</a><br> 
                        </td> 
                    </tr> 
                    <tr> 
                        <td width="20%" valign="top"> 
                            <a href="visao/produto.php">Produto</a><br> 
                        </td> 
                    </tr> 
                </table> 
            </td> 
        </tr> 
    </table> 
    </fieldset> 
<?php 
}?> 
</form> 
</body> 
</html>