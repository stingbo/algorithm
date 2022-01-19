<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        list($base, $map) = count($nums1) > count($nums2) ? [$nums2, array_count_values($nums1)] : [$nums1, array_count_values($nums2)];
        $intersect = [];
        foreach ($base as $value) {
            if (in_array($value, array_keys($map))) {
                $intersect[] = $value;
                --$map[$value];
                if ($map[$value] <= 0) {
                    unset($map[$value]);
                }
            }
        }

        return $intersect;
    }
}

$nums1 = [1,2,2,1];
$nums2 = [2,2,2];

//$nums1 = [4,9,5];
//$nums2 = [9,4,9,8,4];

//$nums1 = [1,2];
//$nums2 = [1,1];

$so = new Solution();
$res = $so->intersect($nums1, $nums2);
print_r($res);
