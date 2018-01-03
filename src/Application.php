<?php

namespace Tree;

use Tree\Models\BinaryTree;
use Tree\Helpers\ShowSearch;
use Tree\Helpers\DepthSearch;
use Tree\Helpers\SortSearch;
use Tree\Helpers\StructureSearch;
use Tree\Helpers\PathSearch;

class Application {
    
    /**
     *
     * @var BinaryTree
     */
    private $tree;

    public function run() {
        $this->setup();
        $this->search();
        $this->show();
    }

    protected function setup() {
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

    protected function search() {
        $this->maximumSearch = new ShowSearch();
        $this->maximumSearch->setType('maximum');
        $this->tree->maximum($this->maximumSearch);
                
        $this->minimumSearch = new ShowSearch();
        $this->minimumSearch->setType('minimum');
        $this->tree->minimum($this->minimumSearch);
        
        $this->DepthSearch = new DepthSearch();
        $this->tree->traverse($this->DepthSearch);

        $node_from = 17;
        $node_to = 16;
        $this->PathSearch = new PathSearch();
        $this->PathSearch->setPath($node_from, $node_to);
        $this->tree->find($node_to, $this->PathSearch);        
        
        $this->SortSearch = new SortSearch();
        $this->SortSearch->start();
        $this->tree->traverse($this->SortSearch);

        $this->StructureSearch = new StructureSearch();
        $this->StructureSearch->start();
        $this->tree->traverse($this->StructureSearch);
        
        $this->tree->remove(3);
    }

    protected function show() {
        $this->maximumSearch->finish();
        $this->minimumSearch->finish();
        $this->DepthSearch->finish();
        $this->PathSearch->finish();
        $this->SortSearch->finish();
        $this->StructureSearch->finish();
    }
    
}
