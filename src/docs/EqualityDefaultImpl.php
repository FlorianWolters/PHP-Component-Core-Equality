<?php
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityTrait;

/**
 * Demonstrates the usage of the default equivalence relation on non-`null`
 * object references implemented with the trait {@link EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
class EqualityDefaultImpl implements EqualityInterface
{
    /**
     * Imports the class method {@link EqualityTrait::isEqual} and the member
     * method {@link EqualityTrait::equals}.
     */
    use EqualityTrait;
}
