<?php

include './BinaryTree.php';
include './OrderTravel.php';

$array = [3, 2, 9, null, null, 10, null, null, 8, null, 4];

$bt = new BinaryTree($array);
$bt = $bt->createBinaryTree();
print_r($bt);

echo '前序遍历'.PHP_EOL;
$ot = new OrderTravel();
$ot->preOrderTravel($bt);

echo '中序遍历'.PHP_EOL;
$ot->inOrderTravel($bt);

echo '后序遍历'.PHP_EOL;
$ot->postOrderTravel($bt);
