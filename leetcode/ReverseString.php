<?php

class Solution
{

    /**
     * @param String[] $s
     *
     * @return NULL
     */
    function reverseString(&$s)
    {
        if (empty($s)) {
            return $s;
        }

        $l = count($s);
        $i = 0;
        $j = $l - 1;
        if ($i == $j) {
            return $s;
        }
        for ($i = 0;$i < $l;++$i) {
            if ($i >= $j) {
                break;
            }
            $temp = $s[$j];
            $s[$j] = $s[$i];
            $s[$i] = $temp;
            --$j;
        }

        return $s;
    }
}

$s = ["h","e","l","l","o"];
$s = ["H","a","n","n","a","h"];
$solu = new Solution();
$result = $solu->reverseString($s);
print_r($result);
