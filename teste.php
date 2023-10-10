<?php

// Verifique se a extensão libsodium está disponível
if (extension_loaded('sodium')) {
    $data = 'SeuTextoAqui'; // Substitua com os dados que você deseja hash
    
    // Gerar um hash BLAKE2b (usando a função sodium_crypto_generichash)
    $hash = sodium_crypto_generichash($data);
    
    // O resultado será uma string binária. Para representar em formato hexadecimal, você pode usar a função bin2hex
    $hexHash = bin2hex($hash);
    
    echo "Hash BLAKE2b: $hexHash";
} else {
    echo "A extensão libsodium não está habilitada no seu ambiente PHP.";
}

?>