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

use FlorianWolters\Example\ReferenceEqualityImpl;

/**
 * Test class for {@see ReferenceEqualityTrait}.
 *
 * @since Class available since Release 0.2.0
 */
final class ReferenceEqualityTraitTest extends EqualityTestAbstract
{
    /**
     * @return array
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
