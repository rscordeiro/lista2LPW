<?php
include_once("controlegeral.php");
function selecionaOpcao(){
    $id_opr    = @$_REQUEST["id_opr"];
    $tx_acao   = @trim(strtolower($_REQUEST["acao"]));
    $id_categoria   = @$_REQUEST["id_categoria"];
    $tb_categoriacol   = @$_REQUEST["tb_categoriacol"];
    $tabela = "tb_categoria";
    $pk = "id_categoria";
    switch($tx_acao){
        case "incluir":
            $id = selectMax($tabela, $pk);
            $valores = "$id , '$tb_categoriacol'";
            if(insert($tabela, $valores)){
                echo "Registro incluido com sucesso<br>";
            }
            $_REQUEST["tb_categoriacol"] = "";
            $_REQUEST["id_opr"]=1;
            break;
        case "salvar":
            $valores = "tb_categoriacol='$tb_categoriacol'";
            if(update($tabela, $valores, "id_categoria=$id_categoria")){
                echo "Registro alterado com sucesso<br>";
            }
            $_REQUEST["id_opr"]=2;
            break;
        case "excluir":
            if(delete($tabela, "id_categoria=$id_categoria")){
                echo "Registro excluído com sucesso<br>";
            }
            echo "<script language=javascript>self.location.href='index.php'; </script>";
            break;
    }
    if (!empty($id_categoria) && $tx_acao=="") {
        $result = select($tabela, "*", "id_categoria = $id_categoria", null);
        if ($linha=camposRegistro($result)) {
            $_REQUEST["tb_categoriacol"] = $linha["tb_categoriacol"];
        }
    }
}?>