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
    }
}

$string = '7329341';
echo $string.PHP_EOL;
$select = new Insertion($string);
