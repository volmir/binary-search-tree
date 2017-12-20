<?php

namespace PVV\helpers;

use PVV\models\Tree;
use PVV\helpers\TreeVisitor;

/** 
 * 
 * @package PVV\helpers
 */
class HorizontallyPrinter implements TreeVisitor {

    /**
     * 
     * @param Tree $node
     * @param int $pos
     */
    public function visit(Tree $node, int $pos) {
        for ($i = 0; $i < $pos; $i++) {
            echo "\t";
        }
        echo $node->key . PHP_EOL;
    }

}
