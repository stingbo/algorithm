<?php

include './sort.php';

class Merge extends Sort
{
    public function __construct()
    {
    }

    public function sort()
    {
        // 数组长度
        $len = count($this->comparable) - 1;
        $mid = ceil($len / 2);
        $i = $lo = 0;
        $j = $mid + 1;

        $aux = [];
        for ($k = $lo; $k <= $len; $k ++) {
            $aux[$k] = $this->comparable[$k];
        }

        for ($k = $lo; $k <= $len; $k ++) {
            if ($i > $mid) {
                $this->comparable[$k] = $aux[$j++];
            } elseif ($j > $len) {
                $this->comparable[$k] = $aux[$i++];
            } elseif ($this->less($aux[$j], $aux[$i])) {
                $this->comparable[$k] = $aux[$j++];
            } else {
                $this->comparable[$k] = $aux[$i++];
            }
        }

        $this->show();
    }
}

$s1 = microtime(true);
$sort = new Merge();
$array = $sort->randElement(10);
echo implode(',', $array).PHP_EOL;
$sort->sort();

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
