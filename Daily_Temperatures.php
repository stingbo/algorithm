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
                $this->compare($element);
            } else {
                array_push($this->stack, $element);
            }
        }
    }

    /**
     * 循环比较.
     */
    public function compare2($map)
    {
        $res = []; //结果

        $len = count($map);
        for ($i = 0; $i < $len; ++$i) {
            $res[$i] = 0;
            for ($j = $i + 1; $j < $len; ++$j) {
                if ($map[$j] > $map[$i]) {
                    $res[$i] = $j - $i;
                    break;
                }
            }
        }

        return $res;
    }

    /**
     * 随机生成测试数据.
     */
    public function randElement($len = 10)
    {
        for ($i = 0; $i < $len; ++$i) {
            $map[] = rand(10, 30);
        }

        return $map;
    }
}

$dt = new DailyTemp();

// 测试元素
$elemets = $dt->randElement(100000);
print_r(array_splice($elemets, 0, 10));

// 用栈实现
$s1 = microtime(true);
$result1 = $dt->temp($elemets);
print_r(array_splice($dt->result, 0, 10));
$e1 = microtime(true);
echo $e1 - $s1;
echo PHP_EOL;

// 常规循环实现
$s2 = microtime(true);
$result2 = $dt->compare2($elemets);
print_r(array_splice($result2, 0, 10));
$e2 = microtime(true);
echo $e2 - $s2;
echo PHP_EOL;
