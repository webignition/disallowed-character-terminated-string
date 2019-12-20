<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString\Tests;

use webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString;

class DisallowedCharacterTerminatedStringTest extends \PHPUnit\Framework\TestCase
{
    public function testCastingToString()
    {
        $string = new DisallowedCharacterTerminatedString();

        $string->set('input value');
        $this->assertEquals('input value', (string)$string);
    }

    public function testStringIsTerminatedByDisallowedCharacter()
    {
        $string = new DisallowedCharacterTerminatedString();
        $string->addDisallowedCharacterCode(ord(' '));

        $string->set('will-be-terminated-by-first-space and-should-not-include-this');
        $this->assertEquals('will-be-terminated-by-first-space', $string->get());
    }

    public function testIgnoreEndOfLineComment()
    {
        $string = new DisallowedCharacterTerminatedString();
        $string->addDisallowedCharacterCode(ord('#'));

        $string->set('value #comment');
        $this->assertEquals('value ', $string->get());
    }
}
