<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;
use Tree\Helpers\ITreeVisitor;
use Tree\Logs\Logger;
use Tree\Logs\Printer;

class DepthSearch implements ITreeVisitor {
    
    use Logger;
    use Printer;    
    
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
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        if ($pos > $this->height) {
            $this->height = $pos;
        }
    }

    public function finish() {
        $this->addMessage('');
        $this->addMessage('Глубина дерева: ' . $this->getHeight());
        $this->setMessages($this->getMessages())->showMessages();
    }
}
