<?php
include "conexao.php";

$matricula = $_POST['matricula'];
$candidatoEscolhido = $_POST['candidato'];
$sugestao = $_POST['sugestao'];

// Calcula o hash SHA-3-256
$hash = hash('sha3-256', $matricula);

// Verifica se a matrícula já existe no banco de dados
$sql = "SELECT * FROM resultado WHERE matricula = '$hash'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // A matrícula não existe, então podemos inserir no banco de dados
    $sql = "INSERT INTO resultado (matricula, candidato, sugestao) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt !== false) {
        $stmt->bind_param("sss", $hash, $candidatoEscolhido, $sugestao);
        if ($stmt->execute()) {
            $mensagem = "Dados inseridos com sucesso.";
        } else {
            $mensagem = "Erro ao inserir dados:<br> " . $stmt->error;
        }
    } else {
        $mensagem = "Erro ao preparar a consulta.";
    }
} else {
    $mensagem = "Esta matrícula já existe no banco de dados.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img class="img" src="img/logo_uepa2_0.png" alt="Logotipo da UEPA">
        </div>
        <div class="barra-horizontal"></div>
    </header>
    <div class="content">
        <h1>Resposta do Processamento</h1>
        <p>
            <?php
            if (isset($mensagem)) {
                if (strpos($mensagem, "sucesso") !== false) {
                    echo '<span style="color: green;">' . $mensagem . '</span>';
                } else {
                    echo '<span style="color: red;">' . $mensagem . '</span>';
                }
            }
            ?>
        </p>
        <a href="index.php" class="btn">Retornar à Página Inicial</a>
    </div>
</body>
</html>
