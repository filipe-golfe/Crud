<?php
include ('../../conexao.php');
$id = $_POST['id'];
$cpf = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$limiteCredito = $_POST['limiteCredito'];
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$logradouro = $_POST['logradouro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$status = $_POST['status'];

if ($status == "on"){
    $status = 'A';
}
else
{
    $status = 'I';
}

$SQLUF = "select id_uf from tb_uf where descricao='" . $uf ."'";
$RSUF = mysqli_query($conexao,$SQLUF);
$RowUF = mysqli_fetch_assoc($RSUF);
$uf = $RowUF['id_uf'];

$SQL = "update tb_cliente set cpf = '$cpf', cnpj = '$cnpj', limite_credito = $limiteCredito, nome = '$nome', cep = '$cep', numero = $numero, 
logradouro = '$logradouro', cidade = '$cidade', id_uf= '$uf', status = '$status' where id_cliente = $id";
if(!mysqli_query($conexao,$SQL))
{
    $erro = mysqli_error($conexao);
    echo ('deu pau pra atualizar: ' . $erro);
}
?>