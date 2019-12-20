<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString\Tests;

use webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString;

class DisallowedCharacterTerminatedStringTest extends \PHPUnit\Framework\TestCase
{
    public function testCastingToString()
    {
        $string = new DisallowedCharacterTerminatedString('input value');

        $this->assertEquals('input value', (string)$string);
    }

    public function testStringIsTerminatedByDisallowedCharacter()
    {
        $string = new DisallowedCharacterTerminatedString(
            'will-be-terminated-by-first-space and-should-not-include-this',
            [
                ord(' '),
            ]
        );

        $this->assertEquals('will-be-terminated-by-first-space', $string->get());
    }

    public function testIgnoreEndOfLineComment()
    {
        $string = new DisallowedCharacterTerminatedString('value #comment', [
            ord('#'),
        ]);

        $this->assertEquals('value ', $string->get());
    }
}
