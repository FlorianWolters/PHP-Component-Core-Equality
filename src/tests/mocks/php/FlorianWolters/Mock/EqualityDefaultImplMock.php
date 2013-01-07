<?php
namespace FlorianWolters\Component\Core;

/**
 * A mock class for {@link EqualityTraitTest} that uses the default behaviour of
 * the trait {@link EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @see       EqualityTraitTest
 * @since     Class available since Release 0.1.0
 */
class EqualityDefaultImplMock implements EqualityInterface
{
    /**
     * Imports the class method {@link EqualityTrait::isEqual} and the member
     * method {@link EqualityTrait::equals}.
     */
    use EqualityTrait;
}
