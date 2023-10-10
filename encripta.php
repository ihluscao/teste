<?php
// Dado de entrada (matrícula)
$matricula = "sua_matricula_aqui";

// Calcula o hash SHA-1
$hash = sha1($matricula);

// Conexão com o banco de dados (substitua pelos seus próprios detalhes)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a matrícula já existe no banco de dados
$sql = "SELECT * FROM tabela_matriculas WHERE hash = '$hash'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // A matrícula não existe, então podemos inserir no banco de dados
    $sql = "INSERT INTO tabela_matriculas (matricula, hash) VALUES ('$matricula', '$hash')";
    if ($conn->query($sql) === TRUE) {
        echo "Matrícula inserida com sucesso!";
    } else {
        echo "Erro ao inserir a matrícula: " . $conn->error;
    }
} else {
    echo "Esta matrícula já existe no banco de dados.";
}

$conn->close();
?>
