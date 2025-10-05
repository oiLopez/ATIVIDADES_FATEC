<html>
<head>
    <meta charset="UTF-8">
    <title>Listagem de Funcionários</title>
    <link rel="stylesheet" href="styles/listagem_style.css">
</head>
<body>
    <div class ="container">
        <div class =  "filtro">
            <center>
                <form name="form1" method="POST" action="listagem.php">
                    <label> DIGITE O NOME DO FUNCIONÁRIO: </label>
                    <input type="text" name="busca_nome">
                    <input type="submit" value="FILTRAR">
                </form>
            </center>
        </div>

        <div class = "tabela">
            <table border="1" align="center">
                <tr>
                    <th colspan="9" bgcolor="LightGrey">LISTAGEM DE FUNCIONÁRIOS CADASTRADOS</th>
                </tr>
                <tr>
                    <th bgcolor="LightBlue">Nº REGISTRO</th>
                    <th bgcolor="LightBlue">NOME</th>
                    <th bgcolor="LightBlue">DATA DE ADMISSÃO</th>
                    <th bgcolor="LightBlue">CARGO</th>
                    <th bgcolor="LightBlue">QTDE SALÁRIOS</th>
                    <th bgcolor="LightBlue">SALÁRIO BRUTO</th>
                    <th bgcolor="LightBlue">INSS</th>
                    <th bgcolor="LightBlue">SALÁRIO LÍQUIDO</th>
                    <th bgcolor="LightBlue">APAGAR</th>
                </tr>
        </div>

   </div>     
<?php

include 'conexao.php'; 


if (!empty($_POST['busca_nome'])) {
    $nome_busca = $_POST['busca_nome'];
    
    
    $sql = "SELECT * FROM tb_funcionarios WHERE nome_funcionario LIKE ? ORDER BY nome_funcionario ASC";
    $stmt = $conexao->prepare($sql);
    
    
    $termo_busca = "%" . $nome_busca . "%"; 
    $stmt->bind_param("s", $termo_busca);

} else {
    
    $sql = "SELECT * FROM tb_funcionarios ORDER BY nome_funcionario ASC";
    $stmt = $conexao->prepare($sql);
}


$stmt->execute();

$resultado = $stmt->get_result();


if ($resultado->num_rows > 0) {
    
    while($linha = $resultado->fetch_assoc()){
?>
        <tr>
            <td bgcolor ="white"><?php echo htmlspecialchars($linha['n_registro']); ?></td>
            <td bgcolor ="white"><?php echo htmlspecialchars($linha['nome_funcionario']); ?></td>
            <td bgcolor ="white"><?php echo htmlspecialchars($linha['data_admissao']); ?></td>
            <td bgcolor ="white"><?php echo htmlspecialchars($linha['cargo']); ?></td>
            <td bgcolor ="white"><?php echo htmlspecialchars($linha['qtde_salarios']); ?></td>
            <td bgcolor ="white">R$ <?php echo number_format($linha['salario_bruto'], 2, ',', '.'); ?></td>
            <td bgcolor ="white">
                <?php 
                    
                    if (is_numeric($linha['inss'])) {
                        echo 'R$ ' . number_format($linha['inss'], 2, ',', '.');
                    } else {
                        echo htmlspecialchars($linha['inss']); 
                    }
                ?>
            </td>
            <td bgcolor ="white">R$ <?php echo number_format($linha['salario_liquido'], 2, ',', '.'); ?></td>
            <td bgcolor ="white">
                <form method="POST" action="excluir.php" style="display:inline;">
                    <input type="hidden" name="n_registro" value="<?php echo htmlspecialchars($linha['n_registro']); ?>">
                    <input type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este funcionário?');">
                </form>
            </td>
        </tr>
<?php
    } 
} else {
    echo "<tr><td colspan='9' align='center'>Nenhum funcionário encontrado.</td></tr>";
}

$stmt->close();
$conexao->close();
?>
    </table>
    <br>
    <center>
        <a href="home_funcionarios.php">RETORNAR AO CADASTRO</a>
    </center>

    <?php
session_start(); 
?>

<html>
<head>
    </head>
<body>
    <center>
        <?php
            
            if (isset($_SESSION['mensagem'])) {
                echo "<p style='color:green;'>" . htmlspecialchars($_SESSION['mensagem']) . "</p>"; 
                unset($_SESSION['mensagem']);
            }
        ?>
        <form name="form1" method="POST" action="listagem.php">
    

</body>
</html>