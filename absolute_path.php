<?php

/**
 * 通过相对路径找绝对路径，使用栈来对比查找.
 */
class AbsolutePath
{
    /**
     * 相对路径.
     */
    public $relative_path;

    /**
     * 栈.
     */
    public $stack = [];

    public function __construct($relative_path)
    {
        $this->relative_path = array_filter(explode('/', $relative_path));
    }

    /**
     * 获取绝对路径.
     */
    public function getAbsolutePath()
    {
        foreach ($this->relative_path as $path) {
            if (empty($this->relative_path)) {
                if ('..' == $path || '.' == $path) {
                    array_push($this->stack, '/');
                } else {
                    array_push($this->stack, '/'.$path);
                }
            } else {
                if ('..' == $path) {
                    array_pop($this->stack);
                } elseif ('.' == $path) {
                    continue;
                } else {
                    array_push($this->stack, $path);
                }
            }
        }

        return implode('/', $this->stack);
    }
}

$relative_path = '.././A/B/../C/./D/./E/../F/G/H/../';
echo $relative_path.PHP_EOL;
$ap = new AbsolutePath($relative_path);
$absolute_path = $ap->getAbsolutePath();
echo $absolute_path;
