<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@link EqualityUtilsTest}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @see       EqualityTrait
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\EqualityUtilsTest
 */
class EqualityUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerIsEqual()
    {
        $firstDefault = new EqualityDefaultImplMock;
        $secondDefault = new EqualityDefaultImplMock;
        $thirdDefault = new EqualityDefaultImplMock;

        $firstCustom = new EqualityCustomImplMock;
        $secondCustom = new EqualityCustomImplMock(0);
        $thirdCustom = new EqualityCustomImplMock('');

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

            // Test cases with instances from different classes
            [false, $firstDefault, $firstCustom],
            [false, $firstCustom, $firstDefault],

            // Test cases with null
            [true, null, null],
            [false, $firstDefault, null],
            [false, null, $firstDefault]
        ];
    }

    /**
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @covers FlorianWolters\Component\Core\EqualityUtils::isEqual
     * @dataProvider providerIsEqual
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
}
