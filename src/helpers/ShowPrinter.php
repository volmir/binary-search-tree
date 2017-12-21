<?php

namespace Tree\helpers;

use Tree\models\BinaryTree;
use Tree\helpers\ITreeVisitor;

class ShowPrinter implements ITreeVisitor {
    
    /**
     *
     * @var BinaryTree
     */
    public $node;
    /**
     *
     * @var string
     */
    public $type;    
    
    public function setType(string $type = '') {
        $this->type = $type;
    }

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $key = 0) {
        $this->node = $node;
    }

    public function finish() {
        if ($this->type == 'maximum') {
            echo PHP_EOL . 'Maximum value: ' . $this->node->key . PHP_EOL;
        } elseif ($this->type == 'minimum') {
            echo PHP_EOL . 'Minimum value: ' . $this->node->key . PHP_EOL;
        }
    }
}
