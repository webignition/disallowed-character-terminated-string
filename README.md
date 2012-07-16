Disallowed Character Terminated String [![Build Status](https://secure.travis-ci.org/webignition/disallowed-character-terminated-string.png?branch=master)](http://travis-ci.org/webignition/disallowed-character-terminated-string)
====================================

Overview
---------

A given string will be terminated when reaching the first of one or more specified
disallowed characters.

Useful when stripping out end-of-line comments or when discarding whatever follows
a line return.

Example Usage
---------------

```php
<?php
$string = new \webignition\DisallowedCharacterTerminatedString\DisallowedCharacterTerminatedString();
$string->addDisallowedCharacterCode(ord('#'));

$string->set('value #comment');
$this->assertEquals('value ', $string->get());
?>
```

Building
--------

When used on its own, make a suitable directory and clone the repository:

    # Make a suitable project directory
    mkdir ~/disallowed-character-terminated-string && cd ~/disallowed-character-terminated-string

    # Clone repository
    git clone git@github.com:webignition/disallowed-character-terminated-string.git .

If used as a dependency by another project, update that project's composer.json
and update your dependencies.

    "require": {
        "webignition/disallowed-character-terminated-string": "*"      
    },
    "repositories": [
        {
            "type":"vcs",
            "url": "https://github.com/webignition/disallowed-character-terminated-string"
        }
    ]

Testing
-------

Have look at the [project on travis][4] for the latest build status, or give the tests
a go yourself.

    cd ~/disallowed-character-terminated-string
    phpunit


[4]: http://travis-ci.org/webignition/disallowed-character-terminated-string/builds