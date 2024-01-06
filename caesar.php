<?php

$shiftnummer = (int) readline("Enter shift nummer:  ");

$massage = readline("enter message:  k");
$alphabet = str_split("abcdefghijklmnopqrstuvwxyz");

$encryptMessage = "";
foreach(str_split($massage) as $string){
    if (in_array($string, $alphabet)){
        $index = array_search($string, $alphabet) + $shiftnummer;
        if ($index > sizeof($alphabet) - 1){
            $index = $index - sizeof($alphabet);
        }
        $encryptMessage .= $alphabet[$index];
        } else {
            $encryptMessage .= $string;
            }
            }
            echo "Encrypted massage: ". $encryptMessage . "\n";

?>
