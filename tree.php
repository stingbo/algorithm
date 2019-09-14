<?php

$len = 9;
for ($i = 0; $i < $len; $i++) {
    if ($i < 5) {
        for ($j = 5; $j > $i; $j--) {
            echo ' ';
        }
        $end = ($i + 1) * 2 -1;
        for ($k = 0; $k < $end; $k++) {
            echo '*';
        }
    } else {
        for ($j = $len; $j > 5; $j--) {
            echo ' ';
        }
        for ($k = 0; $k < 3; $k++) {
            echo '*';
        }
    }
    echo "\n";
}
