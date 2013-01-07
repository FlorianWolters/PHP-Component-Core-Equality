<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityTrait;

/**
 * A mock class for {@link EqualityTraitTest} that uses the default behaviour of
 * the trait {@link EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @see       EqualityTraitTest
 * @since     Class available since Release 0.1.0
 */
class EqualityDefaultImplMock implements EqualityInterface
{
    use EqualityTrait;
}
