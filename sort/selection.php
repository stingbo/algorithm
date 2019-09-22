<?php

include './sort.php';

/**
 * 选择排序.
 * 交换的次数总是N，算法的时间效率取决与比较的次数.
 */
class Selection extends Sort
{
    public function sort()
    {
        // 数组长度
        $n = count($this->comparable);
        for ($i = 0; $i < $n; ++$i) { // 将a[i]和a[i+1..N]中最小的元素交换
            $min = $i;
            // 最小元素的索引
            for ($j = $i + 1; $j < $n; ++$j) {
                if ($this->less($this->comparable[$j], $this->comparable[$min])) {
                    $min = $j;
                }
            }
            $this->exch($i, $min);
        }

        $this->show();
    }
}

$sort = new Selection();
$array = $sort->randElement(10);
echo implode(',', $array).PHP_EOL;
$sort->sort();
