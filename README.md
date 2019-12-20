Disallowed Character Terminated String [![Build Status](https://secure.travis-ci.org/webignition/disallowed-character-terminated-string.png?branch=master)](http://travis-ci.org/webignition/disallowed-character-terminated-string)
====================================

Overview
---------

A given string will be terminated when reaching the first of one or more specified
terminating characters.

Useful when stripping out end-of-line comments or when discarding whatever follows
a line return.

Example Usage
---------------

```php
<?php

use webignition\DisallowedCharacterTerminatedString\TerminatedString;

$string = new TerminatedString('value #comment', ['#']);

$this->assertEquals('value ', $string->get());
```

Installation and Updating
-------------------------

```
composer require webignition/disallowed-character-terminated-string
composer update webignition/disallowed-character-terminated-string
```

Testing
-------

To run tests:

`composer test`

To run code quality checks:

`composer cs`

To run static analysis:

`composer static-analysis`

To run all test and analyses:

`composer ci`

Have look at the [project on travis][4] for the latest build status, or give the tests
a go yourself.

[4]: http://travis-ci.org/webignition/disallowed-character-terminated-string/builds