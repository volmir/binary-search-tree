<?php

namespace PVV;

use PVV\models\Tree;
use PVV\helpers\HeightPrinter;
use PVV\helpers\SortPrinter;
use PVV\helpers\HorizontallyPrinter;

class Application {
    
    /**
     *
     * @var Tree
     */
    private $tree;

    public function __construct() {
        
    }

    public function run() {
        $this->initData();
        $this->printTree();
    }

    private function initData() {
        $this->tree = new Tree(17);

        $tree2 = new Tree(170);
        $tree2->insert(new Tree(240));
        $tree2->insert(new Tree(70));
        $this->tree->insert($tree2);

        $tree3 = new Tree(56);
        $tree3->insert(new Tree(64));
        $tree3->insert(new Tree(75));
        $tree3->insert(new Tree(31));
        $this->tree->insert($tree3);

        $this->tree->insert(new Tree(24));
        $this->tree->insert(new Tree(7));
        $this->tree->insert(new Tree(1));
        $this->tree->insert(new Tree(15));
        $this->tree->insert(new Tree(3));
        $this->tree->insert(new Tree(9));
        $this->tree->insert(new Tree(40));
        $this->tree->insert(new Tree(5));
        $this->tree->insert(new Tree(14));
        $this->tree->insert(new Tree(11));
        $this->tree->insert(new Tree(19));
        $this->tree->insert(new Tree(4));
        $this->tree->insert(new Tree(16));
        $this->tree->insert(new Tree(8));
    }

    private function printTree() {
        $heightPrinter = new HeightPrinter();
        $this->tree->traverse($heightPrinter);
        echo PHP_EOL . 'Tree height is: ' . $heightPrinter->getHeight() . PHP_EOL;

        echo PHP_EOL . 'Show sorted tree:' . PHP_EOL;
        $this->tree->traverse(new SortPrinter());

        echo PHP_EOL . 'Show tree horizontally:' . PHP_EOL;
        $this->tree->traverse(new HorizontallyPrinter());
    }

}
