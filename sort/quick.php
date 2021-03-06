<?php

include './sort.php';

/**
 * 快速排序.
 */
class Quick extends Sort
{
    public function __construct()
    {
    }

    public function quickSort()
    {
        shuffle($this->comparable);
        print_r($this->comparable);
        $this->sort(0, count($this->comparable) - 1);

        //$this->show();
    }

    public function sort($lo, $hi)
    {
        if ($hi < $lo) return;

        $j = $this->partition($lo, $hi);
        print_r($this->comparable);
        print_r($j);
        die;
        $this->sort($lo, $j - 1);
        $this->sort($j, $hi);
    }

    /**
     * 切分.
     */
    public function partition($lo, $hi)
    {
        $i = $lo;
        $j = $hi +1;
        $v = $this->comparable[$lo];

        while (true) {
            while ($this->less($this->comparable[++$i], $v)) {
                if ($i == $hi) {
                    break;
                }
            }
            while ($this->less($v, $this->comparable[--$j])) {
                if ($j == $lo) {
                    break;
                }
            }
            if ($i >= $j) {
                break;
            }
            $this->exch($i, $j);
        }
        //echo 'aaa';
        $this->exch($lo, $j);

        //print_r($this->comparable);
        //echo $j;die;
        return $j;
    }
}

$s1 = microtime(true);
$sort = new Quick();
$array = $sort->randElement(10, 1, 10);
echo implode(',', $array).PHP_EOL;
//$test = [8, 2, 7, 9, 6, 1, 5];
//$sort->sort();
$rst = $sort->quickSort();
print_r($rst);

echo PHP_EOL;
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;
