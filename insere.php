<?php

include "conexao.php";

$matricula = $_POST['matricula'];
$candidatoEscolhido = $_POST['candidato'];
$sugestao = $_POST['sugestao'];

// Calcula o hash SHA-1
$hash = sha1($matricula);

// Verifica se a matrícula já existe no banco de dados
$sql = "SELECT * FROM resultado WHERE matricula = '$hash'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // A matrícula não existe, então podemos inserir no banco de dados
    $sql = "INSERT INTO resultado (matricula) VALUES ('$hash')";
    if ($conn->query($sql) === TRUE){
        echo "Matrícula inserida com sucesso!<br>";
    } else {
        echo "Erro ao inserir a matrícula:<br> " . $conn->error;
    }
} else {
    echo "Esta matrícula já existe no banco de dados.<br>";
}

$sql = "INSERT INTO resultado (candidato, sugestao) VALUES (?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $candidatoEscolhido, $sugestao);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso.<br>";
} else {
    echo "Erro ao inserir dados:<br> " . $stmt->error;
}

$conn->close();
?>
