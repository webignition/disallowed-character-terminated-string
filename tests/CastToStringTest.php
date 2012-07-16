<?php
ini_set('display_errors', 'On');

class CastToStringTest extends PHPUnit_Framework_TestCase {

    public function testCastingToString() {       
        $string = new \webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString();
        
        $string->set('input value');
        $this->assertEquals('input value', (string)$string);
    }
    
}