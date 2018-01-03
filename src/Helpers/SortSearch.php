<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;
use Tree\Helpers\TreeVisitor;
use Tree\Logs\Logger;
use Tree\Logs\Printer;

class SortSearch implements ITreeVisitor {
    
    use Logger;
    use Printer; 
    
    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        $this->addMessage(' ' . $node->key);
    }
    
    public function start() {
        $this->addMessage('');
        $this->addMessage('Вывод отсортированного дерева (значения по возрастанию):');
    }
    
    public function finish() {
        $this->setMessages($this->getMessages())->showMessages();
    }
}
