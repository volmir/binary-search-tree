<?php

namespace Tree\helpers;

use Tree\models\BinaryTree;

interface ITreeVisitor {

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos);
}
