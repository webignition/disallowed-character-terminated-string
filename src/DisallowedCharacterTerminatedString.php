<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString;

/**
 * A string terminated by the presence of a disallowed character
 */
class DisallowedCharacterTerminatedString
{
    private $disallowedValueCharacterCodes = [];
    private $value = '';

    /**
     * @param string $value
     * @param int[] $disallowedValueCharacterCodes
     */
    public function __construct(string $value, array $disallowedValueCharacterCodes = [])
    {
        $this->disallowedValueCharacterCodes = $disallowedValueCharacterCodes;
        $this->value = $this->filter($value);
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

    public function __toString(): string
    {
        return $this->value;
    }

    private function filter(string $value): string
    {
        $filteredValue = '';
        $valueCharacters = str_split(trim((string)$value));

        $hasTerminated = false;

        foreach ($valueCharacters as $valueCharacter) {
            if (in_array(ord($valueCharacter), $this->disallowedValueCharacterCodes)) {
                $hasTerminated = true;
            }

            if (false === $hasTerminated) {
                $filteredValue .= $valueCharacter;
            }
        }

        return $filteredValue;
    }
}
