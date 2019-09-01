<?php

include './sort.php';

class Insertion extends Sort
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
$sort = new Insertion();
$array = $sort->randElement(10000);
echo implode(',', $array).PHP_EOL;
$sort->sort();

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
