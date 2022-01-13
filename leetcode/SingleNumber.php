<?php

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    function singleNumber($nums)
    {
        $len = count($nums);
        if ($len <= 0) {
            return 0;
        }

        $i = 0;
        $result = 0;
        for ($i;$i<$len;++$i) {
            $result ^= $nums[$i];
        }

        return $result;
    }
}

$nums = [4,1,2,1,2];
$nums = [2,2,1];
$solu = new Solution();
$result = $solu->singleNumber($nums);
var_dump($result);

