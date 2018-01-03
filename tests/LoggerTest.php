<?php

use PHPUnit\Framework\TestCase;
use Tree\Helpers\SortSearch;

final class LoggerTest extends TestCase
{
    
    protected function setUp()
    {
        $this->sortSearch = new SortSearch();
    }    

    public function testSetGetMessages()
    {
        $this->sortSearch->addMessage('Message 1');
        $this->sortSearch->addMessage('Message 2');
        $messages = $this->sortSearch->getMessages();
        
        $this->assertInternalType('array', $messages);
        $this->assertEquals(2, count($messages));
        
        $this->sortSearch->clearMessages();
        $this->assertEquals(0, count($this->sortSearch->getMessages()));
    }    
}