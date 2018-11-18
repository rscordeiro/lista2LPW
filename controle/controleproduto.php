<?php
include_once("controlegeral.php");
function selecionaOpcao(){
    $id_opr = @$_REQUEST["id_opr"];
    $tx_acao  = @trim(strtolower($_REQUEST["acao"]));
    $id_produto = @$_REQUEST["id_produto"];
    $nome = @$_REQUEST["nome"];
    $codigo = @$_REQUEST["codigo"];
    $descricao = @$_REQUEST["descricao"];
    $id_categoria  = @$_REQUEST["id_categoria"];
    $valor_venda = @$_REQUEST["valor_venda"];
    $valor_compra  = @$_REQUEST["valor_compra"];
    $tabela = "tb_produto";
    $pk = "id_produto";
    switch($tx_acao){
        case "incluir":
            $id = selectMax($tabela, $pk);
            $valores = "$id , $nome, $codigo, $descricao, $valor_compra, $valor_venda, $id_categoria";
            if(insert($tabela, $valores)){
                echo "Registro incluido com sucesso<br>";
            }
            $_REQUEST["nome"] = "";
            $_REQUEST["codigo"] = "";
            $_REQUEST["descricao"] = "";
            $_REQUEST["valor_compra"] = "";
            $_REQUEST["valor_venda"] = "";
            $_REQUEST["id_categoria"] = "";
            $_REQUEST["id_opr"]=1;
            break;
        case "salvar":
            $valores = "tx_nome='$nome', id_categoria=$id_categoria, valor_venda=$valor_venda, valor_compra=$valor_compra";
            if(update($tabela, $valores, "id_produto=$id_produto")){
                echo "Registro alterado com sucesso<br>";
            }
            $_REQUEST["id_opr"]=2;
            break;
        case "excluir":
            if(delete($tabela, "id_produto=$id_produto")){
                echo "Registro excluído com sucesso<br>";
            }
            echo "<script language=javascript>self.location.href='index.php'; </script>";
            break;
    }
    if (!empty($id_produto) && $tx_acao=="") {
        $result = select($tabela, "*", "id_produto = $id_produto", null);
        if ($linha=camposRegistro($result)) {
            $_REQUEST["nome"] = $linha["nome"];
            $_REQUEST["id_categoria"]  = $linha["id_categoria"];
            $_REQUEST["valor_venda"] = $linha["valor_venda"];
            $_REQUEST["valor_compra"]  = $linha["valor_compra"];
        }
    }
}?>