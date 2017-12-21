<?php

namespace Tree\helpers;

use Tree\models\BinaryTree;
use Tree\helpers\ITreeVisitor;

class StructurePrinter implements ITreeVisitor {

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        for ($i = 0; $i < $pos; $i++) {
            echo "\t";
        }
        echo $node->key . PHP_EOL;
    }

    public function start() {
        echo PHP_EOL . 'Show tree structure:' . PHP_EOL;
    }    
}
