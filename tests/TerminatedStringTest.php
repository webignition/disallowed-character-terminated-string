<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString\Tests;

use webignition\DisallowedCharacterTerminatedString\TerminatedString;

class TerminatedStringTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     *
     * @param string $value
     * @param string[] $terminatingCharacters
     * @param string $expectedString
     */
    public function testCreate(string $value, array $terminatingCharacters, string $expectedString)
    {
        $terminatedString = new TerminatedString($value, $terminatingCharacters);

        $this->assertSame($expectedString, (string) $terminatedString);
    }

    public function createDataProvider(): array
    {
        return [
            'empty value, no terminating characters' => [
                'value' => '',
                'terminatingCharacters' => [],
                'expectedString' => '',
            ],
            'empty value, has terminating characters' => [
                'value' => '',
                'terminatingCharacters' => [
                    '#',
                    ' ',
                ],
                'expectedString' => '',
            ],
            'non-empty value without, no terminating characters' => [
                'value' => 'non-empty value',
                'terminatingCharacters' => [],
                'expectedString' => 'non-empty value',
            ],
            'non-empty value without, with terminating characters' => [
                'value' => 'non-empty value',
                'terminatingCharacters' => [
                    ' ',
                    '-',
                ],
                'expectedString' => 'non',
            ],
            'multi-byte' => [
                'value' => '➊ ➋ ➌ ➍ ➎ ➏ ➐ ➑ ➒ ➓',
                'terminatingCharacters' => [
                    '➎',
                ],
                'expectedString' => '➊ ➋ ➌ ➍ ',
            ],
        ];
    }

    public function testCastingToString()
    {
        $string = new TerminatedString('input value');

        $this->assertEquals('input value', (string)$string);
    }

    public function testStringIsTerminatedByDisallowedCharacter()
    {
        $string = new TerminatedString(
            'will-be-terminated-by-first-space and-should-not-include-this',
            [
                ' ',
            ]
        );

        $this->assertEquals('will-be-terminated-by-first-space', $string->get());
    }

    public function testIgnoreEndOfLineComment()
    {
        $string = new TerminatedString('value #comment', [
            '#',
        ]);

        $this->assertEquals('value ', $string->get());
    }
}
