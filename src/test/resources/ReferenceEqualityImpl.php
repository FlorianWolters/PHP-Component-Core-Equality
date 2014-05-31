<?php
/**
 * FlorianWolters\Component\Core\Equality
 *
 * PHP Version 5.4
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2014 Florian Wolters (http://blog.florianwolters.de)
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 */

namespace FlorianWolters\Example;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\ReferenceEqualityTrait;

/**
 * The class {@see ReferenceEqualityImpl} can be used to demonstrate the usage
 * of the trait {@see ReferenceEqualityTrait}.
 *
 * @since Class available since Release 0.2.0
 */
final class ReferenceEqualityImpl implements EqualityInterface
{
    use ReferenceEqualityTrait;
}
