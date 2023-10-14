<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação - UEPA</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="candidates_chart.js"></script>
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
            <table class="tabela_votacao" border="1">
                <tr class="linha_matricula">
                    <td colspan="3" class="matricula_cell"><span class="matricula_label">Digite sua matrícula:</span>
                    <input name="matricula" type="text" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="10" required></td><br>
                </tr>
                <tr>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td><br>
                </tr>
                <tr class="linha_candidatos">
                    <td><input type="radio" name="candidato" value="Wanderson Quinto" required><span>Wanderson Quinto</span></td>
                    <td><input type="radio" name="candidato" value="Maria Graciete" required><span>Maria Graciete</span></td>
                    <td><input type="radio" name="candidato" value="Outros" required><input type="text" name="sugestao" placeholder="Coloque sua sugestão aqui"></td>
                    
                </tr>
                <tr class="linha_botao">
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
    </div>
</body>
</html>