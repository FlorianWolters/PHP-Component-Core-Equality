<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@link EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @see       EqualityTrait
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\EqualityTrait
 */
class EqualityTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerSuccess()
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

            [false, $firstDefault, $firstCustom],
            [false, $firstCustom, $firstDefault],
            [false, $firstDefault, null]
        ];
    }

    /**
     * @param boolean                $expected
     * @param EqualityInterface      $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @covers FlorianWolters\Component\Core\EqualityTrait::isEqual
     * @dataProvider providerSuccess
     * @test
     */
    public function testIsEqual(
        $expected,
        EqualityInterface $first,
        EqualityInterface $second = null
    ) {
        // TODO Is the static method really a good idea? Hardcoded dependencies
        // ftw!
        $actual = EqualityDefaultImplMock::isEqual($first, $second);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param boolean                $expected
     * @param EqualityInterface      $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @covers FlorianWolters\Component\Core\EqualityTrait::equals
     * @dataProvider providerSuccess
     * @test
     */
    public function testEquals(
        $expected,
        EqualityInterface $first,
        EqualityInterface $second = null
    ) {
        $actual = $first->equals($second);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerNull()
    {
        $obj = new EqualityDefaultImplMock;

        return [
            [true, null, null],
            [false, null, $obj]
        ];
    }

    /**
     * @param boolean                $expected
     * @param EqualityInterface|null $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @covers FlorianWolters\Component\Core\EqualityTrait::isEqual
     * @dataProvider providerNull
     * @test
     */
    public function testIsEqualWithNull(
        $expected,
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $actual = EqualityDefaultImplMock::isEqual($first, $second);

        $this->assertEquals($expected, $actual);
    }

//    /**
//     * @return array
//     */
//    public static function providerFailure()
//    {
//        $default = new EqualityDefaultImplMock;
//
//        $custom = new EqualityCustomImplMock;
//
//        return [
//            [$default, $custom],
//            [$custom, $default]
//        ];
//    }
//
//    /**
//     * @param EqualityInterface $first
//     * @param EqualityInterface $second
//     * @param boolean           $expected
//     *
//     * @return void
//     *
//     * @covers FlorianWolters\Component\Core\EqualityTrait::isEqual
//     * @dataProvider providerFailure
//     * @expectedException \RuntimeException
//     * @test
//     */
//    public function testIsEqualThrowsRuntimeException(
//        EqualityInterface $first,
//        EqualityInterface $second)
//    {
//        EqualityDefaultImplMock::isEqual($first, $second);
//    }
//
//    /**
//     * @param EqualityInterface $first
//     * @param EqualityInterface $second
//     * @param boolean           $expected
//     *
//     * @return void
//     *
//     * @covers FlorianWolters\Component\Core\EqualityTrait::equals
//     * @dataProvider providerFailure
//     * @expectedException \RuntimeException
//     * @test
//     */
//    public function testEqualsThrowsRuntimeException(
//        EqualityInterface $first,
//        EqualityInterface $second)
//    {
//        $first->equals($second);
//    }
}
