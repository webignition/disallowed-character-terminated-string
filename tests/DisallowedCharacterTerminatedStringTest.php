<?php
ini_set('display_errors', 'On');

class DisallowedCharacterTerminatedStringTest extends PHPUnit_Framework_TestCase {

    public function testStringIsTerminatedByDisallowedCharacter() {       
        $string = new \webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString();
        $string->addDisallowedCharacterCode(ord(' '));
        
        $string->set('will-be-terminated-by-first-space and-should-not-include-this');
        $this->assertEquals('will-be-terminated-by-first-space', $string->get());
    }
    
}