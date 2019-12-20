<?php

declare(strict_types=1);

namespace webignition\DisallowedCharacterTerminatedString;

/**
 * A string terminated by the presence of a disallowed character
 */
class TerminatedString
{
    private $terminationMarkers = [];
    private $value = '';

    /**
     * @param string $value
     * @param string[] $terminationMarkers
     */
    public function __construct(string $value, array $terminationMarkers = [])
    {
        $this->terminationMarkers = $terminationMarkers;
        $this->value = $this->filter($value);
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
        $characters = preg_split('//u', $value, -1, PREG_SPLIT_NO_EMPTY);

        if (false === $characters || [] === $characters) {
            return '';
        }

        $hasTerminated = false;

        foreach ($characters as $character) {
            if (in_array($character, $this->terminationMarkers)) {
                $hasTerminated = true;
            }

            if (false === $hasTerminated) {
                $filteredValue .= $character;
            }
        }

        return $filteredValue;
    }
}
