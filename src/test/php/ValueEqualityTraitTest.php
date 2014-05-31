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

namespace FlorianWolters\Component\Core;

use FlorianWolters\Example\ValueEqualityImpl;

/**
 * Test class for {@see ValueEqualityTrait}.
 *
 * @since Class available since Release 0.2.0
 */
final class ValueEqualityTraitTest extends EqualityTestAbstract
{
    /**
     * @return array
     */
    public static function providerEquals()
    {
        $firstValue = new ValueEqualityImpl;
        $secondValue = new ValueEqualityImpl;
        $thirdValue = new ValueEqualityImpl;
        $fourthValue = new ValueEqualityImpl;
        $fourthValue->foo = 'bar';

        return [
            // reflexive?
            [true, $firstValue, $firstValue],
            // symmetric?
            [true, $secondValue, $firstValue],
            [true, $firstValue, $secondValue],
            // transitive?
            [true, $secondValue, $thirdValue],
            [true, $firstValue, $thirdValue],
            // works with null argument?
            [false, $firstValue, null],
            // implements value equality?
            [false, $firstValue, $fourthValue]
        ];
    }
}
