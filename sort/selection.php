<?php

class Selection
{
    public $comparable = [];

    public function __construct($string)
    {
        // 从标准输入读取字符串,将它们排序并输出
        $this->comparable = str_split($string);
        $this->sort();
        $this->show();
    }

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

    private function less($v, $w): bool
    {
        return bccomp($v, $w) < 0;
    }

    private function exch($i, $j): void
    {
        $temp = $this->comparable[$i];
        $this->comparable[$i] = $this->comparable[$j];
        $this->comparable[$j] = $temp;
    }

    private function show(): void
    {
        // 在单行中打印数组
        for ($i = 0; $i < count($this->comparable); ++$i) {
            print_r($this->comparable[$i]);
        }
    }

    public function isSorted(): boolean
    {
        // 测试数组元素是否有序
        for ($i = 1; $i < count($this->comparable); ++$i) {
            if ($this->less($this->comparable[$i], $this->comparable[$i - 1])) {
                return false;
            }
        }

        return true;
    }
}

$string = '732934';
echo $string.PHP_EOL;
$select = new Selection($string);
