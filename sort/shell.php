<?php

include './sort.php';

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
            echo $h.PHP_EOL;
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
$array = $sort->randElement(10000);
echo implode(',', $array).PHP_EOL;
$sort->sort();

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
