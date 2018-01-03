<?php

namespace Tree\Helpers;

use Tree\Models\BinaryTree;
use Tree\Helpers\ITreeVisitor;
use Tree\Logs\Logger;
use Tree\Logs\Printer;

class PathSearch implements ITreeVisitor {
    
    use Logger;
    use Printer;     
    
    /**
     *
     * @var int
     */
    public $from;
    /**
     *
     * @var int
     */
    public $to;
    /**
     *
     * @var int
     */
    public $path = [];    
    
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
     * @param int $key
     */
    public function visit(BinaryTree $node, int $key = 0) {
        $this->path[] = $node->key;
    }
    
    /**
     * 
     * @param int $from
     * @param int $to
     */
    public function setPath(int $from, int $to) {
        $this->from = $from;
        $this->to = $to;
    }
    
    public function start() {
        $this->from = 0;
        $this->to = 0;
        $this->path[] = [];
    }    
    
    public function finish() {
        $this->addMessage('');
        $this->addMessage('Нахождение пути из "Узел ' . $this->from . '" в "Узел ' . $this->to . '":');
        
        if (count($this->path) && $this->from && $this->to) {
            $path = [];
            $start = FALSE;
            $end = FALSE;            
            foreach ($this->path as $node) {
                if ($node == $this->from) {
                    $start = TRUE;
                }
                if ($start && !$end) {
                    $path[] = $node;
                }
                if ($node == $this->to) {
                    $end = TRUE; 
                }
            }
            if (count($path) && $end) {
                $this->addMessage(implode(' -> ', $path));
            } else {
                $this->addMessage('Путь не найден');
            }
        } else {
            $this->addMessage('Ничего не найдено');
        }
        
        $this->setMessages($this->getMessages())->showMessages();
    }
}
