<?php
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityUtils;

require '../../vendor/autoload.php';
require 'EqualityDefaultImpl.php';
require 'EqualityCustomImpl.php';

exit(main());

function main()
{
    demonstrateDefaultImplementation();
    demonstrateCustomImplementation();
}

function demonstrateDefaultImplementation()
{
    $firstObj = new EqualityDefaultImpl;
    $secondObj = new EqualityDefaultImpl;
    $thirdObj = new EqualityDefaultImpl;

    writeLine('Default implementation:');
    output($firstObj, $secondObj, $thirdObj);
}

function output(
    EqualityInterface $firstObj,
    EqualityInterface $secondObj,
    EqualityInterface $thirdObj
) {
    writeLine();
    // Member method
    writeLine('$firstObj->equals($firstObj) = ' . $firstObj->equals($firstObj)); // reflexive!
    writeLine('$secondObj->equals($firstObj) = ' . $secondObj->equals($firstObj));
    writeLine('$firstObj->equals($secondObj) = ' . $firstObj->equals($secondObj)); // symmetric!
    writeLine('$secondObj->equals($thirdObj) = ' . $secondObj->equals($thirdObj));
    writeLine('$firstObj->equals($thirdObj) = ' . $firstObj->equals($thirdObj)); // transitive!

    // Utility class method
    writeLine('EqualityUtils::isEqual($firstObj, $secondObj) = ' . EqualityUtils::isEqual($firstObj, $secondObj));

    // Class method (Will be removed in a future version!)
    writeLine('EqualityDefaultImpl::isEqual($firstObj, $secondObj) = ' . EqualityDefaultImpl::isEqual($firstObj, $secondObj));

    // Global function (Will be removed in a future version!)
    writeLine('FlorianWolters\Component\Core\is_equal($firstObj, $secondObj) = ' . FlorianWolters\Component\Core\is_equal($firstObj, $secondObj));
    writeLine();
}

function writeLine($text = '')
{
    echo $text . \PHP_EOL;
}

function demonstrateCustomImplementation()
{
    $firstObj = new EqualityCustomImpl;
    $secondObj = new EqualityCustomImpl(false);
    $thirdObj = new EqualityCustomImpl(0);

    writeLine('Custom implementation:');
    output($firstObj, $secondObj, $thirdObj);
}
