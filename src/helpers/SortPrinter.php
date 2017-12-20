<?php

namespace PVV\helpers;

use PVV\models\Tree;
use PVV\helpers\TreeVisitor;

/** 
 * 
 * @package PVV\helpers
 */
class SortPrinter implements TreeVisitor {

    /**
     * 
     * @param Tree $node
     * @param int $pos
     */
    public function visit(Tree $node, int $pos) {
        echo " " . $node->key . PHP_EOL;
    }

}
