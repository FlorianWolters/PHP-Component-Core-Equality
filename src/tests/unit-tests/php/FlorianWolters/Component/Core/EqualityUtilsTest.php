<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\EqualityDefaultImplMock;

/**
 * Test class for {@link EqualityUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\EqualityUtils
 */
class EqualityUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass isEqual
     * @dataProvider FlorianWolters\Component\Core\EqualityTestUtils::providerEquals
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
     * @param boolean                $expected
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
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass isNotEqual
     * @dataProvider FlorianWolters\Component\Core\EqualityTestUtils::providerEquals
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
     * @param boolean                $expected
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
            [false, null, new EqualityDefaultImplMock],
            [false, new EqualityDefaultImplMock, null]
        ];
    }

    /**
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass isEqual
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
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass isEqual
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
