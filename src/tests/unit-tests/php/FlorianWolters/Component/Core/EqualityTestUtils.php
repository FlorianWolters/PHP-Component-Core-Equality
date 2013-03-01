<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\EqualityCustomImpl;
use FlorianWolters\Mock\EqualityDefaultImpl;

/**
 * The class {@see EqualityTestUtils} TODO.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
class EqualityTestUtils
{
    /**
     * {@see EqualityTestUtils} instances can **NOT** be constructed in standard
     * programming.
     */
    private function __construct()
    {
    }

    /**
     * @return array
     */
    public static function providerEquals()
    {
        $firstDefault = new EqualityDefaultImpl;
        $secondDefault = new EqualityDefaultImpl;
        $thirdDefault = new EqualityDefaultImpl;

        $firstCustom = new EqualityCustomImpl;
        $secondCustom = new EqualityCustomImpl(0);
        $thirdCustom = new EqualityCustomImpl('');

        return [
            // Test cases for the default behaviour class.

            // reflexive?
            [true, $firstDefault, $firstDefault],
            // symmetric?
            [false, $secondDefault, $firstDefault],
            [false, $firstDefault, $secondDefault],
            // transitive?
            [false, $secondDefault, $thirdDefault],
            [false, $firstDefault, $thirdDefault],

            // Test cases for the custom behaviour class.

            // reflexive?
            [true, $firstCustom, $firstCustom],
            // symmetric?
            [true, $secondCustom, $firstCustom],
            [true, $firstCustom, $secondCustom],
            // transitive?
            [true, $secondCustom, $thirdCustom],
            [true, $firstCustom, $thirdCustom],

            [false, $firstDefault, $firstCustom],
            [false, $firstCustom, $firstDefault],
            [false, $firstDefault, null]
        ];
    }
}
