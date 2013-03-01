<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@see EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Core\EqualityTrait
 */
class EqualityTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param boolean                $expected
     * @param EqualityInterface      $first
     * @param EqualityInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass equals
     * @dataProvider FlorianWolters\Component\Core\EqualityTestUtils::providerEquals
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
