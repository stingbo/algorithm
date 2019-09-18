<?php

$start = ord('A');
$end = ord($argv[1]);
if (!$end) {
    die('请转入一个大写字母');
}
$array = [];

for ($i = $start; $i <= $end; $i++) {
    for ($j = $end; $j > $i; $j--) {
        echo ' ';
    }
    for ($k = $start; $k <= $i; $k++) {
        echo chr($k);
        if ($k < $i) {
            array_push($array, chr($k));
        }
    }

    while ($array) {
        echo array_pop($array);
    }

    //for ($m = $i-1; $m >= $start; $m--) {
        //echo chr($m);
    //}
    echo "\n";
}
