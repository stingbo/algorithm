<?php

class Sort
{
    public $comparable = [];

    public function __construct($string)
    {
        // 从标准输入读取字符串,将它们排序并输出
        $this->comparable = str_split($string);
        $this->sort();
        $this->show();
    }

    protected function less($v, $w): bool
    {
        return bccomp($v, $w) < 0;
    }

    protected function exch($i, $j): void
    {
        $temp = $this->comparable[$i];
        $this->comparable[$i] = $this->comparable[$j];
        $this->comparable[$j] = $temp;
    }

    protected function show(): void
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
