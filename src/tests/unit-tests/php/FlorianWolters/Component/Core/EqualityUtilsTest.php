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
        $actual = EqualityUtils::isEqual($first, $second);

        $this->assertEquals($expected, $actual);
    }
    /**
     * @return array
     */
    public static function providerIsEqualWithNullAsFirstArgument()
    {
        return [
            // Test cases with null
            [true, null, null],
            [false, null, new EqualityDefaultImplMock]
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
     * @dataProvider providerIsEqualWithNullAsFirstArgument
     * @test
     */
    public function testIsEqualWithNullAsFirstArgument(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $actual = EqualityUtils::isEqual($first, $second);

        $this->assertEquals($expected, $actual);
    }
}
