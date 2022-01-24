<?php

/**
 * 转换需要考虑溢出的问题
 * 官方考虑的是判断9，不同位置处理情况不一样.
 */
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $num = implode('',$digits);
        $num = bcadd($num, 1);
        $nums = str_split($num, 1);

        return $nums;
    }
}

//$nums = [0];
//$nums = [4,1,2,1,9];
//$nums = [2,2,1];
$nums = [7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,6];
$solu = new Solution();
$result = $solu->plusOne($nums);
var_dump($result);

