<?php
include "conexao.php";

$sql = "SELECT candidato, COUNT(*) as total_votos FROM resultado GROUP BY candidato";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'candidato' => $row['candidato'],
            'votos' => $row['total_votos']
        );
    }
}

header('Content-Type: application/json');
echo json_encode($data);

?>
