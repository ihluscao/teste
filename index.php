<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Intenção de Votos</title>
</head>
<body>
    <h1>Pesquisa de Intenção de Votos</h1>
    
    <?php
    // Verifique se a pesquisa está ativa (você pode implementar isso de acordo com o período da pesquisa)
    $pesquisaAtiva = true;

    if ($pesquisaAtiva) {
        echo '<form method="post" action="processar_voto.php">';
        echo '<label for="candidato1">Candidato 1:</label>';
        echo '<input type="radio" name="voto" id="candidato1" value="Candidato 1"><br>';
        
        echo '<label for="candidato2">Candidato 2:</label>';
        echo '<input type="radio" name="voto" id="candidato2" value="Candidato 2"><br>';
        
        echo '<label for="sugestao">Sugestão do Público:</label>';
        echo '<input type="radio" name="voto" id="sugestao" value="Sugestão do Público"><br>';
        
        echo '<input type="submit" value="Votar">';
        echo '</form>';
    } else {
        echo '<p>A pesquisa está encerrada.</p>';
    }
    ?>

</body>
</html>