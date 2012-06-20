<?php
ini_set('display_errors', 'On');
require_once(__DIR__.'/../lib/bootstrap.php');

class CastToStringTest extends PHPUnit_Framework_TestCase {

    public function testCastingToString() {       
        $string = new \webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString();
        
        $string->set('input value');
        $this->assertEquals('input value', (string)$string);
    }
    
}