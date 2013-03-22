<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\ReferenceEqualityImpl;
use FlorianWolters\Mock\ValueEqualityImpl;

/**
 * Test class for {@see ReferenceEqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Core\ReferenceEqualityTrait
 */
class ReferenceEqualityTraitTest extends EqualityTestAbstract
{
    /**
     * @return mixed[]
     */
    public static function providerEquals()
    {
        $firstReference = new ReferenceEqualityImpl;
        $secondReference = new ReferenceEqualityImpl;
        $thirdReference = new ReferenceEqualityImpl;

        return [
            // reflexive?
            [true, $firstReference, $firstReference],
            // symmetric?
            [false, $secondReference, $firstReference],
            [false, $firstReference, $secondReference],
            // transitive?
            [false, $secondReference, $thirdReference],
            [false, $firstReference, $thirdReference],
            // works with null argument?
            [false, $firstReference, null]
        ];
    }
}
