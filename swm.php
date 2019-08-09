<?php

/**
 * Sliding Window Maximum 滑动窗口最大值.
 * 双向队列的应用.
 */
class Swm
{
    /**
     * 窗口数组.
     */
    public $win = [];

    /**
     * 窗口大小.
     */
    public $win_len = 3;

    /**
     * 双向队列.
     */
    public $deque = [];

    /**
     * 结果.
     */
    public $result = [];

    public function __construct($win, $win_len)
    {
        $this->win = $win;
        $this->win_len = $win_len;

        if (count($this->win) < $this->win_len) {
            die('数组长度小于窗口长度');
        }
    }

    public function getSwm()
    {
        // 循环数组
        foreach ($this->win as $key => $value) {
            // 双向队列不为空
            if ($this->deque) {
                // 判断队列头是否已经到窗口外部，如果超出，则清除
                if ($key - $this->deque[0]['key'] >= $this->win_len) {
                    array_shift($this->deque);
                }

                // 当前元素与队列尾部进行比较，如果当前元素大于队尾，则清除队尾，直到当前元素小于队尾
                while ($this->deque) {
                    $tail = end($this->deque);
                    if ($tail['value'] >= $value) {
                        break;
                    } else {
                        array_pop($this->deque);
                    }
                }
            }

            // 入队
            array_push($this->deque, ['key' => $key, 'value' => $value]);

            // 记录最大值
            if ($key >= $this->win_len - 1) {
                $this->result[] = $this->deque[0]['value'];
            }
        }

        return $this->result;
    }
}

$win_len = 3;
$win = [1, 0, -1, -3, 2, 3, 1, 7];
//$win = [1, 3, -1, -3, 5, 3, 6, 7];
$swm = new Swm($win, $win_len);

print_r($swm->getSwm());
