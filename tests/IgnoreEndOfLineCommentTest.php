<?php

class IgnoreEndOfLineCommentTest extends PHPUnit_Framework_TestCase {

    public function testIgnoreEndOfLineComment() {       
        $string = new \webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString();
        $string->addDisallowedCharacterCode(ord('#'));
        
        $string->set('value #comment');
        $this->assertEquals('value ', $string->get());
    }
    
}