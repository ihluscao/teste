<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação - UEPA</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validaOutros.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="js/resultTable.js"></script>
    <script src="js/candidates_chart.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <img class="img" src="img/logo_uepa2_0.png" alt="Logotipo da UEPA">
        </div>
        <div class="barra-horizontal"></div>
    </header>
    <div class="content">
        <h1>PESQUISA DE INTENÇÃO DE VOTOS</h1>
        <form class="pesquisa" action="insere.php" method="POST">
            <table class="tabela-votacao">
                <tr class="linha-matricula">
                    <td class="matricula-cell">
                        <span class="matricula-label">Digite sua matrícula:</span>
                        <input name="matricula" type="text" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="10" required>
                    </td>
                </tr>
                <tr class="linha-candidato">
                    <td class="candidato-radio">
                        <input type="radio" name="candidato" value="Wanderson Quinto" required>
                    </td>
                    <td class="candidato-image">
                        <img class="profile" src="img/masc_no_pic.png" alt="Wanderson Quinto">
                    </td>
                    <td class="candidato-details">
                        <h3>Wanderson Quinto</h3>
                        <p>Breve descrição do candidato Wanderson Quinto.</p>
                    </td>
                </tr>
                <tr class="linha-candidato">
                    <td class="candidato-radio">
                        <input type="radio" name="candidato" value="Maria Graciete" required>
                    </td>
                    <td class="candidato-image">
                        <img class="profile" src="img/masc_no_pic.png" alt="Maria Graciete">
                    </td>
                    <td class="candidato-details">
                        <h3>Maria Graciete</h3>
                        <p>Breve descrição da candidata Maria Graciete.</p>
                    </td>
                </tr>
                <tr class="linha-candidato">
                    <td class="candidato-radio">
                        <input type="radio" name="candidato" value="Outros" required>
                    </td>
                    <td class="candidato-image">
                        <img class="profile" src="img/masc_no_pic.png" alt="Sugestão">
                    </td>
                    <td class="candidato-details">
                        <h3>Sugestão</h3>
                        <input type="text" name="sugestao" id="sugestao" placeholder="Coloque sua sugestão aqui" disabled>
                    </td>
                </tr>
                <tr class="linha-botao">
                    <td colspan="3"><input class="btn" type="submit" name="enviar" value="Enviar"></td>
                </tr>
            </table>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div id="container"></div>
        <div id="resultTable"></div>
    </div>
</body>

</html>
