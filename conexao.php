<?php
    $servername = "localhost";
    $database = "eleicao";
    $username = "root";
    $password = "";



    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("Erro:" . mysqli_connect());
    }
    echo "Conectado";
    
    ?>