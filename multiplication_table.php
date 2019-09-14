<?php

for ($i = 1; $i <= 9; $i++) {
    for ($n = 1; $n <= 9; $n++) {
        echo $n.'x'.$i.'='.$i * $n.' ';
        if ($i == $n) {
            echo "\n";
            break;
        }
    }
}
