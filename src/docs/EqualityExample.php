<?php
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityUtils;
use FlorianWolters\Mock\EqualityCustomImplMock;
use FlorianWolters\Mock\EqualityDefaultImplMock;

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
     * Runs the {@see DebugPrintExample}.
     *
     * @param integer $argc The number of arguments.
     * @param array   $argv The arguments.
     *
     * @return integer Always `0`.
     */
    public static function main($argc, array $argv = [])
    {
        $self = new self;
        $self->demonstrateDefaultImplementation();
        $self->demonstrateCustomImplementation();

        return 0;
    }

    /**
     * @return void
     */
    private function demonstrateDefaultImplementation()
    {
        $firstObj = new EqualityDefaultImplMock;
        $secondObj = new EqualityDefaultImplMock;
        $thirdObj = new EqualityDefaultImplMock;

        $this->writeLine('Default implementation:');
        $this->output($firstObj, $secondObj, $thirdObj);
    }

    /**
     * @return void
     */
    private function demonstrateCustomImplementation()
    {
        $firstObj = new EqualityCustomImplMock;
        $secondObj = new EqualityCustomImplMock(false);
        $thirdObj = new EqualityCustomImplMock(0);

        $this->writeLine('Custom implementation:');
        $this->output($firstObj, $secondObj, $thirdObj);
    }

    /**
     *
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

        // Utility class method
        $this->writeLine(
            'EqualityUtils::isEqual($firstObj, $secondObj) = '
            . EqualityUtils::isEqual($firstObj, $secondObj)
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
