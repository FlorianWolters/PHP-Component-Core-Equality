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

/**
 * The abstract class {@see EqualityTestAbstract} is the base class for the
 * equality test cases.
 *
 * @since Class available since Release 0.2.0
 */
abstract class EqualityTestAbstract extends \PHPUnit_Framework_TestCase
{
    /**
     * @param bool                   $expected
     * @param EqualityInterface      $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass equals
     * @dataProvider providerEquals
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
}
