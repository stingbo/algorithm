<?php

class Link
{
    public $_link = [];

    public $_first = null;

    public $_current = null;

    /**
     * 获取链表下一个元素.
     */
    public function _next()
    {
        if (!$this->_current) {
            echo 'please use _first function get the first';
            die;
        }

        $next = $this->_link[$this->_current['next']];

        if ($next) {
            $this->_current = $next;
        }

        return $next;
    }

    /**
     * 获取链表上一个元素.
     */
    public function _prev()
    {
        if (!$this->_current) {
            echo 'please use _first function get the first';
            die;
        }

        $prev = $this->_link[$this->_current['prev']];

        if ($prev) {
            $this->_current = $prev;
        }

        return $prev;
    }

    /**
     * 获取链表第一个元素.
     */
    public function _first()
    {
        $this->_first = reset($this->_link);
        $this->_current = $this->_first;
        if ($this->_first) {
            return $this->_first;
        }

        return null;
    }

    /**
     * 把一维数组变成链表.
     */
    public function createLink($arr, $direction = 1)
    {
        foreach ($arr as $key => $value) {
            $this->_link[$value]['value'] = $value;
            if (isset($arr[($key - 1)])) {
                $this->_link[$value]['prev'] = $arr[$key - 1];
            } else {
                $this->_link[$value]['prev'] = null;
            }

            if (isset($arr[($key + 1)])) {
                $this->_link[$value]['next'] = $arr[$key + 1];
            } else {
                $this->_link[$value]['next'] = null;
            }
        }

        return $this->_link;
    }

    /**
     * 反向.
     */
    public function reverseLink()
    {
    }
}

$a = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];

$l = new Link();
$b = $l->createLink($a);
print_r($b);
print_r($l->_first());
print_r($l->_prev());
print_r($l->_next());
print_r($l->_prev());
print_r($l->_next());
print_r($l->_next());
print_r($l->_next());
print_r($l->_next());
