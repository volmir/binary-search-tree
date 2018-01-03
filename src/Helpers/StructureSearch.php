<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;
use Tree\Helpers\ITreeVisitor;
use Tree\Logs\Logger;
use Tree\Logs\Printer;

class StructureSearch implements ITreeVisitor {
    
    use Logger;
    use Printer; 
    
    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $pos) {
        $message = '';
        for ($i = 0; $i < $pos; $i++) {
            $message .= "\t";
        }
        $this->addMessage($message . $node->key);
    }

    public function start() {
        $this->addMessage('');
        $this->addMessage('Вывод структуры дерева:');
    }    
    
    public function finish() {
        $this->setMessages($this->getMessages())->showMessages();
    }
}
