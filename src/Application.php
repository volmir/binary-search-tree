<?php

namespace Tree;

use Tree\models\BinaryTree;
use Tree\helpers\ShowPrinter;
use Tree\helpers\DepthPrinter;
use Tree\helpers\SortPrinter;
use Tree\helpers\StructurePrinter;
use Tree\helpers\PathPrinter;

class Application {
    
    /**
     *
     * @var BinaryTree
     */
    private $tree;

    public function run() {
        $this->init();
        $this->show();
    }

    protected function init() {
        $this->tree = new BinaryTree(17);
        $this->tree->insert(new BinaryTree(34));
        $this->tree->insert(new BinaryTree(7));
        $this->tree->insert(new BinaryTree(11));
        $this->tree->insert(new BinaryTree(3));
        $this->tree->insert(new BinaryTree(5));
        $this->tree->insert(new BinaryTree(1));
        $this->tree->insert(new BinaryTree(29));
        $this->tree->insert(new BinaryTree(40));
        $this->tree->insert(new BinaryTree(19));
        $this->tree->insert(new BinaryTree(74));
        $this->tree->insert(new BinaryTree(16));
        $this->tree->insert(new BinaryTree(38));
    }

    protected function show() {
        $showPrinter = new ShowPrinter();
        $showPrinter->setType('maximum');
        $this->tree->maximum($showPrinter);
        $showPrinter->finish();
        
        $showPrinter = new ShowPrinter();
        $showPrinter->setType('minimum');
        $this->tree->minimum($showPrinter);
        $showPrinter->finish();
        
        $depthPrinter = new DepthPrinter();
        $this->tree->traverse($depthPrinter);
        $depthPrinter->finish();

        $node_from = 17;
        $node_to = 16;
        $pathPrinter = new PathPrinter();
        $pathPrinter->setPath($node_from, $node_to);
        $this->tree->find($node_to, $pathPrinter);        
        $pathPrinter->finish();
        
        $sortPrinter = new SortPrinter();
        $sortPrinter->start();
        $this->tree->traverse($sortPrinter);

        $structurePrinter = new StructurePrinter();
        $structurePrinter->start();
        $this->tree->traverse($structurePrinter);
        
        $this->tree->remove(3);
    }

}
