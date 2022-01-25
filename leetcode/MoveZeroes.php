<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $zero = 0;
        $len = count($nums);
        foreach ($nums as $key => $num) {
            if (0 == $num) {
                ++$zero;
                unset($nums[$key]);
            }
        }
        if ($zero) {
            $nums = array_pad($nums, $len, 0);
        }

        return $nums;
    }
}

$nums = [0,1,0,3,12];
$solu = new Solution();
$result = $solu->moveZeroes($nums);
print_r($result);

