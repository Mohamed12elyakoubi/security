<?php
if ($argc < 3) {
    die("Gebruik: php aes.php <message> <key>\n");
}
print_r($argv);
$message = $argv[1];
$cipher = "aes-128-gcm";
$key = $argv[2];
echo $message;

$ivlen = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($ivlen);

$encryptedmessage = openssl_encrypt($message, $cipher, $key, $opties = 0, $iv, $tag);
$decryptedmessage = openssl_decrypt($encryptedmessage, $cipher, $key, $opties = 0, $iv, $tag);

echo " ciphertext:" . $encryptedmessage . PHP_EOL;
echo " originetekst:" . $decryptedmessage . PHP_EOL;

echo "##----------------------------------##";

$ciphertext = openssl_encrypt($message, $cipher, $key, $opties = 0, $iv, $tag);
echo "\nciphertext: " . $ciphertext . "\n";

$output = openssl_decrypt($ciphertext, $cipher, $key, $opties = 0, $iv, $tag);
$output = openssl_decrypt($encryptedmessage, $cipher, $key, $opties = 0, $iv, $tag);
echo 'Output: ' . $output;
