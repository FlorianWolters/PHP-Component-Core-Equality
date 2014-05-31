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
use FlorianWolters\Example\ValueEqualityImpl;

/**
 * Test class for {@see EqualityUtils}.
 *
 * @since Class available since Release 0.1.0
 */
final class EqualityUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @dataProvider providerEquals
     * @test
     */
    public function testIsEqual(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $this->assertIsEqual($expected, $first, $second);
    }

    /**
     * @return array
     */
    static function providerEquals() {
        // TODO(wolters): Remove duplication with ReferenceEqualityTraitTest and
        // ValueEqualityTraitTest. Since PHPUnit v4, data providers cannot be
        // reused in the same way?!
        $firstReference = new ReferenceEqualityImpl;
        $secondReference = new ReferenceEqualityImpl;
        $thirdReference = new ReferenceEqualityImpl;
        $firstValue = new ValueEqualityImpl;
        $secondValue = new ValueEqualityImpl;
        $thirdValue = new ValueEqualityImpl;
        $fourthValue = new ValueEqualityImpl;
        $fourthValue->foo = 'bar';

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
            [false, $firstReference, null],
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

    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     */
    private function assertIsEqual(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $actual = EqualityUtils::isEqual($first, $second);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @dataProvider providerEquals
     * @test
     */
    public function testIsNotEqual(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $this->assertIsNotEqual($expected, $first, $second);
    }

    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     */
    private function assertIsNotEqual(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $actual = EqualityUtils::isNotEqual($first, $second);
        $this->assertEquals(!$expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerIsEqualWithNull()
    {
        return [
            // Test cases with null
            [true, null, null],
            [false, null, new ReferenceEqualityImpl],
            [false, new ReferenceEqualityImpl, null],
            [false, null, new ValueEqualityImpl],
            [false, new ValueEqualityImpl, null]
        ];
    }

    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @dataProvider providerIsEqualWithNull
     * @test
     */
    public function testIsEqualWithNull(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $this->assertIsEqual($expected, $first, $second);
    }

    /**
     * @param bool                   $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @dataProvider providerIsEqualWithNull
     * @test
     */
    public function testIsNotEqualWithNull(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $this->assertIsNotEqual($expected, $first, $second);
    }
}
