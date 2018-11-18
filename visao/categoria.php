<!DOCTYPE html> 
<html> 
<head> 
    <title>Cadastro de Categorias</title> 
    <meta charset="UTF-8"> 
    <!-- <link rel="StyleSheet" type="text/css" href="../../css/estilo.css" media="screen" /> --> 
</head> 
<body> 
<?php 
include_once("../acessodados/acessodados.php"); 
include_once("../controle/controlecategoria.php"); 
$result = select("tb_categoria", "*", null, "id_categoria"); ?> 
<fieldset> 
<legend>Listagem de Categorias</legend> 
<a href="operacoes.php?id_opr=1" title="Novo Registro">Novo</a><br/> 
<?php 
if(numLinhas($result)==0){ 
    echo "Nenhum registro encontrado !<br>"; 
} 
else {?> 
    <table border="1" width="100%"> 
        <tr bgcolor="lightblue"> 
            <th>Codigo</th> 
            <th>Categoria</th>  
            <th>Opções</th> 
        </tr> 
        <?php 
        $cont = 0; 
        while($linha = camposRegistro($result)){ 
            $cor = "#ffffff"; 
            if($cont%2==0) { $cor = "#dfdfdf"; } 
            ?> 
            <tr bgcolor="<?php echo $cor?>"> 
                <td><?php echo $linha["id_categoria"]?></td> 
                <td><?php echo $linha["tb_categoriacol"]?></td>  
                <td> 
                    <a href="operacoes.php?id_categoria=<?php echo $linha["id_categoria"]?>&id_opr=2"  
                        title="Alterar registro">Alterar</a>&nbsp;&nbsp; 
                    <a href="operacoes.php?id_categoria=<?php echo $linha["id_categoria"]?>&id_opr=3"  
                        title="Excluir registro">Excluir</a> 
                </td> 
            </tr> 
            <?php 
            $cont++; 
        }?> 
    </table>   
    <?php 
} ?> 
</fieldset> 
</body> 
</html>