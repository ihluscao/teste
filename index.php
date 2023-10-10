<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação - UEPA</title>
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
        <h1>PESQUISA DE INTENÇÃO DE VOTOS</h1>
        <form class="pesquisa" action="insere.php" method="POST">
            <table class="tabela_votacao" border="1">
                <tr class="linha_matricula">
                    <td colspan="3" class="matricula_cell"><span class="matricula_label">Digite sua matrícula:</span>
                    <input name="matricula" type="text"></td><br>
                </tr>
                <tr>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td>
                    <td><img class="profile" src="img/masc_no_pic.png" alt=""></td><br>
                </tr>
                <tr class="linha_candidatos">
                    <td><input type="radio" name="candidato" value="cand1"><span>Candidato 1</span></td>
                    <td><input type="radio" name="candidato" value="cand2"><span>Candidato 2</span></td>
                    <td><input type="radio" name="candidato" value="cand3"><input type="text" name="sugestao" placeholder="Coloque sua sugestão aqui"></td>
                    
                </tr>
                <tr class="linha_botao">
                    <td colspan="3"><input class="btn" type="submit" name="enviar" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>