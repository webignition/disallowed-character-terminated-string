<?php
namespace webignition\DisallowedCharacterTerminatedString;

/**
 * A string terminated by the presence of a disallowed character
 *  
 */
class DisallowedCharacterTerminatedString {
    
    /**
     * Collection of characters not allowed
     * 
     * @var array
     */
    private $disallowedValueCharacterCodes = array();   
    
    /**
     *
     * @var string
     */
    private $value = '';
    
    
    /**
     * Specify another character code whose occurence terminates the string
     * 
     * @param int $characterCode 
     */
    public function addDisallowedCharacterCode($characterCode) {
        if (!in_array($characterCode, $this->disallowedValueCharacterCodes)) {
            $this->disallowedValueCharacterCodes[] = $characterCode;
        }
    }

    /**
     * Return object to default state
     *  
     */
    public function reset() {
        $this->value = '';
        $this->disallowedValueCharacterCodes = array();
    }
    
    /**
     *
     * @return string
     */
    public function get() {
        return $this->value;
    }
    
    
    /**
     * 
     * @param string $value 
     */
    public function set($value) {
        $valueCharacters = str_split(trim((string)$value));        
        $this->value = '';
        
        foreach ($valueCharacters as $valueCharacter) {
            if (in_array(ord($valueCharacter), $this->disallowedValueCharacterCodes)) {
                return;
            }
            
            $this->value .= $valueCharacter;
        }
    }
    
    /**
     *
     * @return string
     */
    public function __toString() {
        return $this->get();
    }
}
