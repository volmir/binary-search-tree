<?php

namespace Tree\Logs;

trait Logger {
    
    /**
     *
     * @var array
     */
    public $messages = [];
    
    public function __construct() {
        ;
    }

    /**
     * 
     * @param string $message
     */
    public function addMessage(string $message) {
        if (is_string($message)) {
           $this->messages[] = $message; 
        }
    }

    /**
     * 
     * @return array
     */
    public function getMessages(): array {
        return $this->messages;
    }

    public function clearMessages() {
        $this->messages = []; 
    }
}
