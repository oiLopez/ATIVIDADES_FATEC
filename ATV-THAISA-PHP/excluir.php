<?php

session_start();

include 'conexao.php'; 


if (isset($_POST['n_registro'])) {
    $registro = $_POST['n_registro'];
    

    $sql = "DELETE FROM tb_funcionarios WHERE n_registro = ?";
    

    $stmt = $conexao->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $registro); 
        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Funcionário excluído com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir funcionário: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $_SESSION['mensagem'] = "Erro ao preparar a query: " . $conexao->error;
    }

} else {
    $_SESSION['mensagem'] = "Nenhum registro selecionado para exclusão.";
}
$conexao->close();


header("Location: listagem.php");
exit(); 
?>