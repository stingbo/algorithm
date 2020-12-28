<?php

class TreeNode
{
    public $node;
    public $lchild;
    public $rchild;

    public function __construct($data)
    {
        $this->node = $data;
    }
}

class BinaryTree
{
    public $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * 创建二叉树.
     */
    public function createBinaryTree()
    {
        $node = null;
        if (!$this->array || empty($this->array)) {
            return null;
        }

        $data = array_shift($this->array);
        if ($data != null) {
            $node = new TreeNode($data);
            $node->lchild = $this->createBinaryTree($this->array);
            $node->rchild = $this->createBinaryTree($this->array);
        }

        return $node;
    }
}

$array = [3, 2, 9, null, null, 10, null, null, 8, null, 4];

$bt = new BinaryTree($array);
$td = $bt->createBinaryTree();
print_r($td);
