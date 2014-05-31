# Component\Core\Equality

**Component\Core\Equality** is a simple-to-use [PHP][1] component that
implements equivalence relations on non-`null` object references.

[![Build Status](https://travis-ci.org/FlorianWolters/PHP-Component-Core-Equality.svg?branch=master)](https://travis-ci.org/FlorianWolters/PHP-Component-Core-Equality)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-Equality/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-Equality/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-Equality/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-Equality/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/2f0f9543-4799-4ed1-9c57-99962cf47771/mini.png)](https://insight.sensiolabs.com/projects/2f0f9543-4799-4ed1-9c57-99962cf47771)
[![Coverage Status](https://img.shields.io/coveralls/FlorianWolters/PHP-Component-Core-Equality.svg)](https://coveralls.io/r/FlorianWolters/PHP-Component-Core-Equality?branch=master)

[![Latest Stable Version](https://poser.pugx.org/florianwolters/component-core-equality/v/stable.png)](https://packagist.org/packages/florianwolters/component-core-equality)
[![Total Downloads](https://poser.pugx.org/florianwolters/component-core-equality/downloads.png)](https://packagist.org/packages/florianwolters/component-core-equality)
[![Monthly Downloads](https://poser.pugx.org/florianwolters/component-core-equality/d/monthly.png)](https://packagist.org/packages/florianwolters/component-core-equality)
[![Daily Downloads](https://poser.pugx.org/florianwolters/component-core-equality/d/daily.png)](https://packagist.org/packages/florianwolters/component-core-equality)
[![Latest Unstable Version](https://poser.pugx.org/florianwolters/component-core-equality/v/unstable.png)](https://packagist.org/packages/florianwolters/component-core-equality)
[![License](https://poser.pugx.org/florianwolters/component-core-equality/license.png)](https://packagist.org/packages/florianwolters/component-core-equality)

[![Stories in Ready](https://badge.waffle.io/florianwolters/php-component-core-equality.png?label=ready&title=Ready)](https://waffle.io/florianwolters/php-component-core-equality)
[![Dependency Status](https://www.versioneye.com/user/projects/51c330fd5862c40002000541/badge.svg)](https://www.versioneye.com/user/projects/51c330fd5862c40002000541)
[![Dependencies Status](https://depending.in/FlorianWolters/PHP-Component-Core-Equality.png)](http://depending.in/FlorianWolters/PHP-Component-Core-Equality)
[![HHVM Status](http://hhvm.h4cc.de/badge/florianwolters/component-core-equality.png)](http://hhvm.h4cc.de/package/florianwolters/component-core-equality)

## Table of Contents (ToC)

* [Introduction](#introduction)
* [Features](#features)
* [Requirements](#requirements)
* [Usage](#usage)
* [Installation](#installation)
* [Testing](#testing)
* [Contributing](#contributing)
* [Credits](#credits)
* [License](#license)

## Introduction

This component is inspired by the method [`java.lang.Object.equals`][53] of the [Java][54] programming language.

**Component\Core\Equality** consists of four artifacts:

1. The interface [`FlorianWolters\Component\Core\EqualityInterface`][56]:
   Indicates that an implementing class implements an equivalence relation on
   non-`null` object references.
2. The trait [`FlorianWolters\Component\Core\ReferenceEqualityTrait`][57]:
   Implements a **reference** equivalence relation on non-`null` object
   references.
3. The trait [`FlorianWolters\Component\Core\ValueEqualityTrait`][58]:
   Implements a **value** equivalence relation on non-`null` object references.
4. The static class [`FlorianWolters\Component\Core\EqualityUtils`][59]: Offers
   operations for equivalence relations on non-`null` object references.

## Features

* Offers two default equivalence relation implementations:
  * **Reference Equality** implemented via the trait
    [`ReferenceEqualityTrait`][57]. Refer to the section
    [Usage](#reference-equality) below for an example.
  * **Value Equality** implemented via the trait [`ValueEqualityTrait`][58].
    Refer to the section [Usage](#value-equality) below for an example.
* Allows to create a custom equivalence relation by implementing the interface
  [`EqualityInterface`][56], more precisely implementing the public method
  `equals` of that interface. Refer to the section [Usage](#custom-equality)
  below for an example.
* The `equals` method implements an equivalence relation on non-`null` object
  references:
  * It is *reflexive*: for any non-`null` reference value `$x`, `$x->equals($x)`
    should return `true`.
  * It is *symmetric*: for any non-`null` reference values `$x` and `$y`,
    `$x->equals($y)` should return `true` if and only if `$y->equals($x)`
    returns `true`.
  * It is *transitive*: for any non-`null` reference values `$x`, `$y`, and
    `$z`, if `$x->equals($y)` returns `true` and `$y->equals($z)` returns
    `true`, then `$x->equals($z)` should return `true`.
  * It is *consistent*: for any non-`null` reference values `$x` and `$y`,
    multiple invocations of `$x->equals($y)` consistently return `true` or
    consistently return `false`, provided no information used in `equals`
    comparisons on the objects is modified.
  * For any non-`null` reference value `$x`, `$x->equals(null)` should return
    `false`.
* Artifacts tested with both static and dynamic test procedures:
    * Dynamic component tests (unit and integration tests) implemented with
      [PHPUnit][41].
    * Static code analysis performed using the following tools:
        * [PHP_CodeSniffer][40]: Style Checker
        * [PHP Mess Detector (PHPMD)][44]: Code Analyzer
        * [PHP Depend][45]: Code Metrics
        * [phpcpd][42]: Copy/Paste Detector (CPD)
        * [phpdcd][43]: Dead Code Detector (DCD)
        * [SensioLabs Security Checker][47]: Security Checker
    * Continuous Integration (CI) using the following web services:
        * [Scrutinizer CI][21]
        * [SensioLabsInsight][22]
        * [Coveralls][23]
        * [VersionEye][24]
        * [Depending][25]
        * [Waffle][26]
* Provides a [Packagist][3] package which can be installed using the dependency
  manager [Composer][2]. Click [here][51] for the package on [Packagist][3].
* Provides a complete Application Programming Interface (API) documentation
  generated with the documentation generator [Sami][46]. Click
  [here][52] for the API documentation.
* Follows the following "standards" from the [PHP Framework Interoperability
  Group (FIG)][10]. PSR stands for PHP Standards Recommendation:
    * [PSR-0][11]: Autoloading Standards

        > Aims to provide a standard file, class and namespace convention to
        > allow plug-and-play code.
    * [PSR-1][12]: Basic Coding Standard

        > Aims to ensure a high level of technical interoperability between
        > shared PHP code.
    * [PSR-2][13]: Coding Style Guide

        > Provides a Coding Style Guide for projects looking to standardize
        > their code.
    * [PSR-4][14]: Autoloader

        > A more modern take on autoloading reflecting advances in the
        > ecosystem.
* Follows the [Semantic Versioning][4] (SemVer) specification version 2.0.0.

## Requirements

### Production

* [PHP][1] >= 5.4
* [Composer][2]

### Development

* [PHPUnit][41]
* [phpcpd][42]
* [phpdcd][43]
* [PHP_CodeSniffer][40]
* [PHP Mess Detector (PHPMD)][44]
* [Sami][46]
* [SensioLabs Security Checker][47]
* [php-coveralls][48]

## Installation

**Component\Core\Equality** should be installed using the
dependency manager [Composer][2].

> [Composer][2] is a tool for dependency management in [PHP][1]. It allows you
> to declare the dependent libraries your project needs and it will install them
> in your project for you.

The [Composer][2] installer can be downloaded with `php`.

    php -r "readfile('https://getcomposer.org/installer');" | php

> This will just check a few [PHP][1] settings and then download `composer.phar`
> to your working directory. This file is the [Composer][2] binary. It is a PHAR
> ([PHP][1] archive), which is an archive format for [PHP][1] which can be run
> on the command line, amongst other things.

> To resolve and download dependencies, run the `install` command:

    php composer.phar install

If you are creating a component that relies on **Component\Core\Equality**, please make sure that you add **Component\Core\Equality** to your component's `composer.json` file:

```json
{
    "require": {
        "florianwolters/component-core-equality": "0.3.*"
    }
}
```

## Usage

The best documentation for **Component\Core\Equality** are the
unit tests, which are shipped in the package.

The most important usage rule:

> Always implement the interface [`EqualityInterface`][56] if using the trait
> [`ReferenceEqualityTrait`][57] or [`ValueEqualityTrait`][58], since that
> allows [Type Hinting][55].

The class [`EqualityExample`][60] can be run via the command
`php resources/php/EqualityExample.php` from the root of the project.

### Reference Equality

The class [`ReferenceEqualityImpl`][61] uses the **Reference Equality**
implementation of the trait [`ReferenceEqualityTrait`][57], that utilizes the
identity operator (`===`) of [PHP][1].

### Value Equality

The class [`ValueEqualityImpl`][62] uses the **Value Equality** implementation
of the trait [`ValueEqualityTrait`][58], that utilizes the equality operator
(`==`) of [PHP][1].

### Custom Equality

One can define a custom equivalence relation by implementing the interface
[`EqualityInterface`][56], more precisely implementing the public method
`equals` of that interface.

***
**Note:** The equivalence relations must be *reflexive*, *symmetric*,
*transitive* and *consistent*. Refer to the section [Features](#features) for a
more detailed explanation of these characteristics.
***

An example for a custom equivalence relation for a simple *Domain Object* is
shown with the class [`CustomEqualityImpl`][63].

## Testing

    phpunit

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

* [Florian Wolters][9]
* [All Contributors][50]

## License

This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Lesser General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along
with this program. If not, see <https://gnu.org/licenses/lgpl.txt>.

[1]: https://php.net
     "PHP: Hypertext Preprocessor"
[2]: https://getcomposer.org
     "Composer"
[3]: https://packagist.org
     "Packagist"
[4]: http://semver.org
     "Semantic Versioning"
[9]: https://github.com/FlorianWolters
     "FlorianWolters · GitHub"
[10]: http://php-fig.org
      "PHP-FIG — PHP Framework Interop Group"
[11]: http://php-fig.org/psr/psr-0
      "PSR-0 requirements for autoloader interoperability"
[12]: http://php-fig.org/psr/psr-1
      "PSR-1 basic coding style guide"
[13]: http://php-fig.org/psr/psr-2
      "PSR-2 coding style guide"
[14]: http://php-fig.org/psr/psr-4
      "PSR-4: Improved Autoloading"
[20]: https://travis-ci.org
      "Travis CI"
[21]: https://scrutinizer-ci.com
      "Scrutinizer CI"
[22]: https://insight.sensiolabs.com
      "SensioLabsInsight"
[23]: https://coveralls.io
      "Coveralls"
[24]: https://versioneye.com
      "VersionEye"
[25]: https://depending.in
      "Depending"
[26]: https://waffle.io
      "Waffle"
[27]: http://hhvm.h4cc.de
      "HHVM Support in PHP Projects"
[40]: https://pear.php.net/package/PHP_CodeSniffer
      "PHP_CodeSniffer"
[41]: https://phpunit.de
      "PHPUnit"
[42]: https://github.com/sebastianbergmann/phpcpd
      "sebastianbergmann/phpcpd · GitHub"
[43]: https://github.com/sebastianbergmann/phpdcd
      "sebastianbergmann/phpdcd · GitHub"
[44]: http://phpmd.org
      "PHPMD - PHP Mess Detector"
[45]: http://pdepend.org
      "PHP Depend - Software Metrics for PHP"
[46]: https://github.com/fabpot/sami
      "fabpot/sami · GitHub"
[47]: https://github.com/sensiolabs/security-checker
      "SensioLabs Security Checker"
[48]: https://github.com/satooshi/php-coveralls
      "satooshi/php-coveralls · GitHub"
[50]: https://github.com/FlorianWolters/PHP-Component-Core-Equality/contributors
      "Contributors to FlorianWolters/PHP-Component-Core-Equality"
[51]: https://packagist.org/packages/florianwolters/component-core-equality
      "florianwolters/component-core-equality - Packagist"
[52]: http://blog.florianwolters.de/PHP-Component-Core-Equality
      "Application Programming Interface (API) documentation"
[53]: http://docs.oracle.com/javase/7/docs/api/java/lang/Object.html#equals(java.lang.Object)
      "Object (Java Platform SE 7)"
[54]: http://java.com
      "Java"
[55]: https://php.net/language.oop5.typehinting
      "PHP: Type Hinting - Manual"
[56]: src/main/php/EqualityInterface.php
      "FlorianWolters\Component\Core\EqualityInterface"
[57]: src/main/php/ReferenceEqualityTrait.php
      "FlorianWolters\Component\Core\ReferenceEqualityTrait"
[58]: src/main/php/ValueEqualityTrait.php
      "FlorianWolters\Component\Core\ValueEqualityTrait"
[59]: src/main/php/EqualityUtils.php
      "FlorianWolters\Component\Core\EqualityUtils"
[60]: resources/php/EqualityExample.php
      "FlorianWolters\Example\EqualityExample"
[61]: src/test/resources/ReferenceEqualityImpl.php
      "FlorianWolters\Example\ReferenceEqualityImpl"
[62]: src/test/resources/ValueEqualityImpl.php
      "FlorianWolters\Example\ValueEqualityImpl"
[63]: resources/php/CustomEqualityImpl.php
      "FlorianWolters\Example\CustomEqualityImpl"
