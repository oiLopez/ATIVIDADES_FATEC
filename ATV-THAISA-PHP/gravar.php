<?php

include 'conexao.php';

$nregistro = $_POST["txt_registro"];
$nome = $_POST["txt_nome"];
$data = $_POST["dt_data"];
$cargo = $_POST["cargo"];
$qnt_salario_min = $_POST["txt_qnt_salario_min"];


$salario_bruto = ($qnt_salario_min * 1412.00);

if ($salario_bruto >= 1550.00) {
    $inss = $salario_bruto * 0.11;
} else {
    $inss = "isento";
}

if ($inss === "isento") {
    $salario_liquido = $salario_bruto;
} else {
    $salario_liquido = $salario_bruto - $inss;
}


$sql = "INSERT INTO tb_funcionarios (n_registro, nome_funcionario, data_admissao, cargo, qtde_salarios, salario_bruto, inss, salario_liquido) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("ssssddsd", $nregistro, $nome, $data, $cargo, $qnt_salario_min, $salario_bruto, $inss, $salario_liquido);


if ($stmt->execute()) {
    echo "<center>";
    echo "<hr>";
    echo "Registro feito com sucesso!";
    echo "<hr><br>";
    echo "<a href=\"listagem.php\">LISTA DE CONTAS</a>";
    echo "</center>";
} else {
 
    echo "Erro ao inserir o registro: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>