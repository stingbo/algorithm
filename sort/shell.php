<?php

include './sort.php';

/**
 * 希尔排序.
 * 任意间隔为h的元素变为有序-h有序数组.
 * 希尔排序的复杂度和增量序列是相关的.
 * {1,2,4,8,...}这种序列并不是很好的增量序列，使用这个增量序列的时间复杂度（最坏情形）是O(n^2).
 */
class Shell extends Sort
{
    public function __construct()
    {
    }

    public function sort()
    {
        // 数组长度
        $n = count($this->comparable);
        $h = 1;
        while ($h < $n / 3) {
            $h = 3 * $h + 1;
        }
        while ($h >= 1) {
            //echo $h.PHP_EOL;
            for ($i = $h; $i < $n; ++$i) {
                for ($j = $i; $j >= $h && $this->less($this->comparable[$j], $this->comparable[$j - $h]); $j = $j - $h) {
                    $this->exch($j, $j - $h);
                }
            }
            $h = floor($h / 3);
        }

        $this->show();
    }
}

$s1 = microtime(true);
$sort = new Shell();
$array = $sort->randElement(10);
echo implode(',', $array).PHP_EOL;
$sort->sort();

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
