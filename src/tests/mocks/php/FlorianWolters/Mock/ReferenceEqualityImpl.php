<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\ReferenceEqualityTrait;

/**
 * The class {@see ReferenceEqualityImpl} can be used to demonstrate the usage
 * of the trait {@see ReferenceEqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.2.0
 */
class ReferenceEqualityImpl implements EqualityInterface
{
    use ReferenceEqualityTrait;
}
