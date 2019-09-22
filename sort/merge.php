<?php

include './sort.php';

/**
 * 归并排序-分治思想.
 */
class Merge extends Sort
{
    public function __construct()
    {
    }

    public function mergeSort($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }
        $mid = floor($len / 2);

        // 递归拆分排序
        $lo = array_slice($arr, 0, $mid);
        $hi = array_slice($arr, $mid);
        if (count($lo) > 1) {
            $lo = $this->mergeSort($lo);
        }
        if (count($hi) > 1) {
            $hi = $this->mergeSort($hi);
        }

        return $this->sort($lo, $hi);
    }

    public function sort($lo, $hi)
    {
        $k = 0;
        $j = 0;
        $n = count($lo) + count($hi);
        $c = [];
        for ($i = 0; $i < $n; ++$i) {
            // 剩余部分直接合并到数组末尾
            if (!isset($lo[$k])) {
                $c = array_merge($c, array_slice($hi, $j));
                break;
            }
            if (!isset($hi[$j])) {
                $c = array_merge($c, array_slice($lo, $k));
                break;
            }

            if ($lo[$k] >= $hi[$j]) {
                $c[] = $hi[$j];
                ++$j;
            } else {
                $c[] = $lo[$k];
                ++$k;
            }
        }

        return $c;
    }
}

$s1 = microtime(true);
$sort = new Merge();
$array = $sort->randElement(10);
echo implode(',', $array).PHP_EOL;
$test = [8, 2, 7, 9, 6, 1, 5];
//$sort->sort();
$rst = $sort->mergeSort($test);
print_r($rst);

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
