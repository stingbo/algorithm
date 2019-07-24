<?php

/**
 * 给定一个数组 $temperatures 代表了未来几天里每天的温度值，
 * 要求返回一个新的数组，数组中的每个元素表示需要经过多少天才能等来温度的升高, 使用栈来实现.
 */
class DailyTemp
{
    public $result = [];

    public $stack = [];

    /**
     * 循环一次数组.
     */
    public function temp($temperatures)
    {
        foreach ($temperatures as $k => $t) {
            $this->result[$k] = 0;
            $element = ['key' => $k, 'value' => $t];

            $this->compare($element);
        }
    }

    /**
     * 递归使用栈来比较.
     */
    public function compare($element)
    {
        if (empty($this->stack)) {
            array_push($this->stack, $element);
        } else {
            $last = end($this->stack);
            if ($last['value'] < $element['value']) {
                $compare = array_pop($this->stack);
                $this->result[$compare['key']] = $element['key'] - $compare['key'];

                // 递归比较
                $this->compare($element, $day);
            } else {
                array_push($this->stack, $element);
            }
        }
    }
}

$temperatures = [23, 25, 22, 19, 21, 21, 26, 23, 22, 19, 25, 24, 19, 26];

$dt = new DailyTemp();
$dt->temp($temperatures);

print_r($temperatures);
print_r($dt->result);
