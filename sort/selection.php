<?php

include './sort.php';

class Selection extends Sort
{
    //public function __construct($string)
    //{
        //// 从标准输入读取字符串,将它们排序并输出
        //$this->comparable = str_split($string);
        //$this->sort();
        //$this->show();
    //}

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
    }
}

$string = '7329341';
echo $string.PHP_EOL;
$select = new Selection($string);
