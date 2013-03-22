<?php
namespace FlorianWolters;

use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityUtils;
use FlorianWolters\Mock\CustomEqualityImpl;
use FlorianWolters\Mock\ReferenceEqualityImpl;
use FlorianWolters\Mock\ValueEqualityImpl;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * The class {@see EqualityExample} implements a simple command line application
 * to demonstrate the component **FlorianWolters\Component\Core\Equality**.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.1
 */
final class EqualityExample
{
    /**
     * Runs this {@see EqualityExample}.
     *
     * @param integer  $argc The number of arguments.
     * @param string[] $argv The arguments.
     *
     * @return integer Always `0`.
     */
    public static function main($argc, array $argv = [])
    {
        $self = new self;
        $self->demonstrateReferenceEquality();
        $self->demonstrateValueEquality();
        $self->demonstrateCustomEquality();

        return 0;
    }

    /**
     * @return void
     */
    private function demonstrateReferenceEquality()
    {
        $firstObj = new ReferenceEqualityImpl;
        $secondObj = new ReferenceEqualityImpl;
        $thirdObj = new ReferenceEqualityImpl;

        $this->writeLine('Reference equality using ReferenceEqualityTrait:');
        $this->output($firstObj, $secondObj, $thirdObj);
    }

    /**
     * @return void
     */
    private function demonstrateValueEquality()
    {
        $firstObj = new ValueEqualityImpl;
        $firstObj->value = null;
        $secondObj = new ValueEqualityImpl;
        $secondObj->value = false;
        $thirdObj = new ValueEqualityImpl;
        $thirdObj->value = true;

        $this->writeLine('Value equality using ValueEqualityTrait:');
        $this->output($firstObj, $secondObj, $thirdObj);
    }

    /**
     * @return void
     */
    private function demonstrateCustomEquality()
    {
        $firstObj = new CustomEqualityImpl(1, 0);
        $secondObj = new CustomEqualityImpl(1, 1);
        $thirdObj = new CustomEqualityImpl(2, 0);

        $this->writeLine('Custom equality using a client implementation:');
        $this->output($firstObj, $secondObj, $thirdObj);
    }

    /**
     * @param EqualityInterface $firstObj
     * @param EqualityInterface $secondObj
     * @param EqualityInterface $thirdObj
     *
     * @return void
     */
    private function output(
        EqualityInterface $firstObj,
        EqualityInterface $secondObj,
        EqualityInterface $thirdObj
    ) {
        $this->writeLine();

        // Member method
        $this->writeLine(
            '$firstObj->equals($firstObj) = ' . $firstObj->equals($firstObj)
        ); // reflexive!
        $this->writeLine(
            '$secondObj->equals($firstObj) = ' . $secondObj->equals($firstObj)
        );
        $this->writeLine(
            '$firstObj->equals($secondObj) = ' . $firstObj->equals($secondObj)
        ); // symmetric!
        $this->writeLine(
            '$secondObj->equals($thirdObj) = ' . $secondObj->equals($thirdObj)
        );
        $this->writeLine(
            '$firstObj->equals($thirdObj) = ' . $firstObj->equals($thirdObj)
        ); // transitive!

        // Utility class methods
        $this->writeLine(
            'EqualityUtils::isEqual($firstObj, $secondObj) = '
            . EqualityUtils::isEqual($firstObj, $secondObj)
        );
        $this->writeLine(
            'EqualityUtils::isNotEqual($firstObj, $secondObj) = '
            . EqualityUtils::isNotEqual($firstObj, $secondObj)
        );
        $this->writeLine();
    }

    /**
     * @param string $text
     *
     * @return void
     */
    private function writeLine($text = '')
    {
        echo $text . \PHP_EOL;
    }
}

exit(EqualityExample::main($argc, $argv));
