<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\EqualityCustomImplMock;
use FlorianWolters\Mock\EqualityDefaultImplMock;

class EqualityTestUtils
{
    /**
     * {@link EqualityTestUtils} instances can **NOT** be constructed in
     * standard programming.
     */
    private function __construct()
    {
    }

    /**
     * @return array
     */
    public static function providerEquals()
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
}
