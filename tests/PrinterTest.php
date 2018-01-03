<?php

use PHPUnit\Framework\TestCase;
use Tree\Helpers\SortSearch;

final class PrinterTest extends TestCase
{
    
    protected function setUp()
    {
        $this->sortSearch = new SortSearch();
    }
    
    public function testSetMessages()
    {
        $messages = [
            'Message 1',
            'Message 2'
        ];
        
        $this->sortSearch->setMessages($messages);
        
        $this->assertEquals(2, count($this->sortSearch->messages));
    }    
}