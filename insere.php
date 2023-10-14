<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Inserção</title>
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
        include "conexao.php";

        $matricula = $_POST['matricula'];
        $candidatoEscolhido = $_POST['candidato'];
        $sugestao = $_POST['sugestao'];
        
        // Calcula o hash SHA-1
        $hash = hash('sha3-256', $matricula);
        
        // Verifica se a matrícula já existe no banco de dados
        $sql = "SELECT * FROM resultado WHERE matricula = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $hash);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 0) {
            // A matrícula não existe, então podemos inserir no banco de dados
            $sql = "INSERT INTO resultado (matricula, candidato, sugestao) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $hash, $candidatoEscolhido, $sugestao);
            if ($stmt->execute()) {
               
            } else {
                echo "Erro ao inserir dados:<br> " . $stmt->error;
            }
        } else {
            
        }
        

        if ($result->num_rows == 0) {
            echo "<p class='success-message'>Dados inseridos com sucesso.</p>";
        } else {
            echo "<p class='error-message'>Esta matrícula já existe no banco de dados.</p>";
        }

        $conn->close();
        ?>
        </p>
        <center><a href="index.php" class="btn">Retornar à Página Inicial</a></center>
</body>
</html>

