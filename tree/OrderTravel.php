<?php

include_once './BinaryTree.php';

class OrderTravel
{
    /**
     * 前序遍历.
     */
    public function preOrderTravel($node)
    {
        if (null == $node) {
            return null;
        }
        print($node->data);
        echo PHP_EOL;
        $this->preOrderTravel($node->lchild);
        $this->preOrderTravel($node->rchild);
    }

    /**
     * 中序遍历.
     */
    public function inOrderTravel($node)
    {
        if (null == $node) {
            return null;
        }
        $this->inOrderTravel($node->lchild);
        print($node->data);
        echo PHP_EOL;
        $this->inOrderTravel($node->rchild);
    }

    /**
     * 后序遍历.
     */
    public function postOrderTravel($node)
    {
        if (null == $node) {
            return null;
        }
        $this->postOrderTravel($node->lchild);
        $this->postOrderTravel($node->rchild);
        print($node->data);
        echo PHP_EOL;
    }
}
