<?php

class TreeNode
{
    public $data;
    public $lchild;
    public $rchild;

    public function __construct($data)
    {
        $this->data = $data;
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
