<?php

namespace PVV\helpers;

use PVV\models\Tree;
use PVV\helpers\TreeVisitor;

/** 
 * 
 * @package PVV\helpers
 */
class HeightPrinter implements TreeVisitor {
    
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
     * @param Tree $node
     * @param int $pos
     */
    public function visit(Tree $node, int $pos) {
        if ($pos > $this->height) {
            $this->height = $pos;
        }
    }

}
