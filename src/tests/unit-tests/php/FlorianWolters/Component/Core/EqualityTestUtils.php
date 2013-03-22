<?php
namespace FlorianWolters\Component\Core;

/**
 * The utility class {@see EqualityTestUtils} contains data providers for the
 * equality test cases.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
final class EqualityTestUtils
{
    /**
     * {@see EqualityTestUtils} instances can **NOT** be constructed in standard
     * programming.
     */
    private function __construct()
    {
    }

    /**
     * @return mixed[]
     */
    public static function providerEquals()
    {
        $referenceProvider = ReferenceEqualityTraitTest::providerEquals();
        $valueProvider = ValueEqualityTraitTest::providerEquals();

        return \array_merge($referenceProvider, $valueProvider);
    }
}
