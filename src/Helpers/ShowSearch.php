<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;
use Tree\Helpers\ITreeVisitor;
use Tree\Logs\Logger;
use Tree\Logs\Printer;

class ShowSearch implements ITreeVisitor {
    
    use Logger;
    use Printer;
    
    /**
     *
     * @var BinaryTree
     */
    public $node;
    /**
     *
     * @var string
     */
    public $type;    
    
    public function setType(string $type = '') {
        $this->type = $type;
    }

    /**
     * 
     * @param BinaryTree $node
     * @param int $pos
     */
    public function visit(BinaryTree $node, int $key = 0) {
        $this->node = $node;
    }

    public function finish() {
        if ($this->type == 'maximum') {
            $this->addMessage('');
            $this->addMessage('Максимальное значение: ' . $this->node->key);
        } elseif ($this->type == 'minimum') {
            $this->addMessage('');
            $this->addMessage('Минимальное значение: ' . $this->node->key);
        }
        
        $this->setMessages($this->getMessages())->showMessages();
    }
}
