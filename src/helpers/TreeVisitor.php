<?php

namespace PVV\helpers;

use PVV\models\Tree;

/** 
 * 
 * @package PVV\helpers
 */
interface TreeVisitor {

    /**
     * 
     * @param Tree $node
     * @param int $pos
     */
    public function visit(Tree $node, int $pos);
}
