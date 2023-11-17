<?php

if (isset($argv[1])) {
    $pwd = md5($argv[1]);
    echo $pwd;
}
?>