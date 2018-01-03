<?php

namespace Tree\Logs;

trait Printer {

    /**
     *
     * @var array
     */
    public $messages = [];

    /**
     * 
     * @param array $messages
     * @return $this
     */
    public function setMessages(array $messages) {
        if (is_array($messages)) {
            $this->messages = $messages;
        }
        
        return $this;
    }

    public function showMessages() {
        if (count($this->messages)) {
            foreach ($this->messages as $message) {
                echo $message . PHP_EOL;
            }
        }
    }
    
}
