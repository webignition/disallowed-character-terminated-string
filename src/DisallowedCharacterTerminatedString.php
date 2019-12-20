<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString;

/**
 * A string terminated by the presence of a disallowed character
 */
class DisallowedCharacterTerminatedString
{
    /**
     * Collection of characters not allowed
     *
     * @var array
     */
    private $disallowedValueCharacterCodes = [];

    /**
     * @var string
     */
    private $value = '';

    public function addDisallowedCharacterCode(int $characterCode): void
    {
        if (!in_array($characterCode, $this->disallowedValueCharacterCodes)) {
            $this->disallowedValueCharacterCodes[] = $characterCode;
        }
    }

    public function reset(): void
    {
        $this->value = '';
        $this->disallowedValueCharacterCodes = array();
    }

    public function get(): string
    {
        return $this->value;
    }

    public function set(string $value): void
    {
        $valueCharacters = str_split(trim((string)$value));
        $this->value = '';

        foreach ($valueCharacters as $valueCharacter) {
            if (in_array(ord($valueCharacter), $this->disallowedValueCharacterCodes)) {
                return;
            }

            $this->value .= $valueCharacter;
        }
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
