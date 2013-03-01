<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityTrait;

/**
 * Demonstrates the usage of the default equivalence relation implementation
 * with the trait {@see EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.1
 */
class EqualityDefaultImpl implements EqualityInterface
{
    use EqualityTrait;
}
