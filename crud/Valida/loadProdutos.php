<?php
session_start();
if((!isset ($_SESSION['usuario']) == true) && (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:../index.php');
}
include ('../../conexao.php');
$SQL = "select id_produto,descricao,quantidade,preco,custo,status from tb_produto";
$Codigo = $_GET['codigo'];
if($Codigo){
    $SQL = "select id_produto,descricao,quantidade,preco,custo,status from tb_produto where id_produto = ".$Codigo;
}
$RS = mysqli_query($conexao,$SQL);
$i = 1;
while ($row = mysqli_fetch_assoc($RS)){
    if($row['status'] == 'I'){
        $inativo = "style='opacity:0.5'";
    }else{
        $inativo = "style='opacity:1'";
    }
    echo "<tr ".$inativo.">
    <th class='centro'>$i</th>
    <td class='centro'>" . $row["id_produto"] . "</td>
    <td class='centro'>" . $row["descricao"] . "</td>
    <td class='centro'>" . $row["quantidade"] ."</td>
    <td class='centro'>" . $row["preco"] . "</td>
    <td class='centro'>" . $row["custo"] . "</td>
    <td class='centro'>" . $row["status"] . "</td>
    <td><i class='fas fa-pencil-alt' onclick='editaProduto(". $row["id_produto"] .");'style='cursor:pointer'>
    </i><i class='fas fa-times ml-3' onclick='excluiProduto(". $row["id_produto"] .");'style='cursor:pointer'></i></td>
    </tr>";
    $i++;
};
?>