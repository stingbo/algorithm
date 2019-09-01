<?php

class Sort
{
    public $comparable = [];

    /**
     * 随机生成测试数据.
     */
    public function randElement($len = 10): array
    {
        for ($i = 0; $i < $len; ++$i) {
            $map[] = rand(1, 30);
        }

        $this->setComparable($map);

        return $map;
    }

    public function setComparable($array): void
    {
        $this->comparable = $array;
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
        echo implode(',', $this->comparable);
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
