<?php

namespace Tree\helpers;

use Tree\models\BinaryTree;
use Tree\helpers\TreeVisitor;

class SortPrinter implements ITreeVisitor {

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        echo ' ' . $node->key . PHP_EOL;
    }
    
    public function start() {
        echo PHP_EOL . 'Show sorted tree (in ascending order):' . PHP_EOL;
    }
}
