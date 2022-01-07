<?php

include './sort.php';

/**
 * 插入排序.
 * 与选择排序不同的是，排序时间与初始元素的顺序有关.
 * 对一个很大且其中元素已经有序（或接近有序）的数组进行排序会比对随机顺序的或逆序数组进行排序要快的多.
 * 比选择排序快一倍.
 */
class Bubble extends Sort
{
    public function sort()
    {
        // 数组长度
        $n = count($this->comparable);
        for ($i = 1; $i < $n; ++$i) {
            for ($j = $i; $j > 0 && $this->less($this->comparable[$j], $this->comparable[$j - 1]); --$j) {
                $this->exch($j, $j - 1);
            }
        }

        $this->show();
    }
}

$s1 = microtime(true);
$sort = new Bubble();
$array = $sort->randElement(10);
//echo implode(',', $array).PHP_EOL;
//$sort->sort();

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
