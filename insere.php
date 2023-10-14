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
            $sugestao = isset($_POST['sugestao']) ? $_POST['sugestao'] : '';

            if (!isset($_COOKIE['user_token'])) {
                $token = bin2hex(random_bytes(32));

                $matriculaHash = hash('sha3-256', $matricula);

                $sql = "SELECT * FROM token WHERE matricula = ? AND user_token IS NOT NULL";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $matriculaHash);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    $sql = "INSERT INTO token (matricula, user_token) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $matriculaHash, $token);
                    if ($stmt->execute()) {
                        $sql = "INSERT INTO resultado (matricula, candidato, sugestao) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sss", $matriculaHash, $candidatoEscolhido, $sugestao);
                        if ($stmt->execute()) {
                            echo "<p class='success-message'>Dados inseridos com sucesso.</p>";
                        } else {
                            echo "Erro ao inserir dados:<br> " . $stmt->error;
                        }
                    } else {
                        echo "Erro ao inserir o token no banco de dados: " . $stmt->error;
                    }
                } else {
                    echo "<p class='error-message'>Esta matrícula já votou. Não é possível votar novamente.</p>";
                }

                setcookie('user_token', $token, time() + 604800);
            } else {
                echo "<p class='error-message'>Você já votou nesta sessão. Não é possível votar novamente.</p>";
            }

            $conn->close();
            ?>

        </p>
        <center><a href="index.php" class="btn">Retornar à Página Inicial</a></center>
    </div>

</body>

</html>