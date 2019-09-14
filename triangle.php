<?php

$start = ord('A');
$end = ord($argv[1]);
if (!$end) {
    die('请转入一个大写字母');
}

for ($i = $start - 1; $i < $end; $i++) {
    for ($j = $end; $j > $i; $j--) {
        echo ' ';
    }
    for ($k = $start; $k <= $i; $k++) {
        echo chr($k);
    }
    for ($k = $i+1; $k >= $start; $k--) {
        echo chr($k);
    }
    echo "\n";
}
