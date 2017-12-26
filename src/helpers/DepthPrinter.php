<?php

namespace Tree\helpers;

use Tree\models\BinaryTree;
use Tree\helpers\ITreeVisitor;

class DepthPrinter implements ITreeVisitor {
    
    /**
     *
     * @var int
     */
    public $height;

    /**
     * 
     * @return int
     */
    public function getHeight() {
        return $this->height + 1;
    }

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        if ($pos > $this->height) {
            $this->height = $pos;
        }
    }

    public function finish() {
        echo PHP_EOL . 'Глубина дерева: ' . $this->getHeight() . PHP_EOL;
    }
}
