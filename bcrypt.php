<?php

if ($argc < 2) {
    die("Gebruik: php bcrypt.php <wachtwoord>\n");
}
$wachtwoord = $argv[1];
$hash = password_hash($wachtwoord, PASSWORD_BCRYPT);
echo $hash . "\n";
fwrite(STDOUT, "Wachtwoord ter controle: ");
$controleWachtwoord = trim(fgets(STDIN));
if (password_verify($controleWachtwoord, $hash)) {
    echo "Wachtwoord klopt!\n";
} else {
    echo "Wachtwoord klopt niet!\n";
}
