<?php

/**
 * BFS找到最短路径.
 */
class BfsMaze
{
    /**
     * 初始点.
     */
    public $start;

    /**
     * 结束点.
     */
    public $end;

    /**
     * 迷宫.
     */
    public $maze = [];

    /**
     * 走过的所有路径.
     */
    public $all_path;

    /**
     * 队列.
     */
    public $queue = [];

    /**
     * 已对比节点.
     */
    public $compared;

    public function __construct($maze, $start, $end)
    {
        $this->maze = $maze;
        $this->start = $start;
        $this->end = $end;
        $this->compared[] = $start;

        // 起始点入队列
        array_push($this->queue, ['parent' => [], 'coordinate' => $start]);
    }

    /**
     * 获取相关结点.
     */
    public function getLinks(array $node)
    {
        $link = [];
        if (empty($node)) {
            return $link;
        }

        // 判断相邻点是否存在、是否可通行、是否不为'黑色'
        $x = $node[0];
        $y = $node[1];
        if (isset($this->maze[$x - 1][$y]) && !$this->maze[$x - 1][$y] && !in_array([$x - 1, $y], $this->compared)) {
            $link[] = [$x - 1, $y];
        }

        if (isset($this->maze[$x + 1][$y]) && !$this->maze[$x + 1][$y] && !in_array([$x + 1, $y], $this->compared)) {
            $link[] = [$x + 1, $y];
        }

        if (isset($this->maze[$x][$y - 1]) && !$this->maze[$x][$y - 1] && !in_array([$x, $y - 1], $this->compared)) {
            $link[] = [$x, $y - 1];
        }

        if (isset($this->maze[$x][$y + 1]) && !$this->maze[$x][$y + 1] && !in_array([$x, $y + 1], $this->compared)) {
            $link[] = [$x, $y + 1];
        }

        return $link;
    }

    /**
     * 搜索.
     */
    public function search()
    {
        while (!empty($this->queue)) {
            // 出队列
            $node = array_shift($this->queue);

            // 判断是否为终点
            if ($node['coordinate'] == $this->end) {
                $this->all_path[] = $node;

                return true;
            }

            // 运行全路径
            $this->all_path[] = $node;

            // 获取相关节点
            $links = $this->getLinks($node['coordinate']);

            foreach ($links as $link) {
                // 把父级与当前节点入队列
                array_push($this->queue, ['parent' => $node['coordinate'], 'coordinate' => $link]);

                // 标记为已对比的节点
                $this->compared[] = $link;
            }
        }
    }

    /**
     * 获取正确路径.
     */
    public function getAnswer()
    {
        // 反转根据出口找所走的路径
        $stack = [];
        $answer = [];
        $path = array_reverse($this->all_path);
        foreach ($path as $p) {
            if (empty($answer)) {
                $answer[] = $p['coordinate'];
                array_push($stack, $p);
            } else {
                $tmp = array_pop($stack);
                if ($p['coordinate'] == $tmp['parent']) {
                    array_unshift($answer, $p['coordinate']);
                    array_push($stack, $p);
                } else {
                    array_push($stack, $tmp);
                    continue;
                }
            }
        }

        return $answer;
    }
}

$maze = [
    [0, 1, 0, 0, 0],
    [0, 1, 0, 1, 0],
    [0, 0, 0, 0, 0],
    [0, 1, 1, 1, 0],
    [0, 0, 0, 1, 0],
];

//$bfs = new BfsMaze($maze, [0, 0], [4, 4]);
$bfs = new BfsMaze($maze, [4, 4], [4, 0]);
$bfs->search();
$answer = $bfs->getAnswer();
print_r($answer);
