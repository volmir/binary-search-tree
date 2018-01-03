<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;

interface ITreeVisitor {

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos);
}
