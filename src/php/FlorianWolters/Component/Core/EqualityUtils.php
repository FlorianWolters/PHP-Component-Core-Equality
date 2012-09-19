<?php
namespace FlorianWolters\Component\Core;

/**
 * The static class {@link EqualityUtils} offers operations for equivalence
 * relations on non-`null` object references.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
class EqualityUtils
{
    // @codeCoverageIgnoreStart

    /**
     * {@link EqualityUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     * /---code php
     * EqualityUtils::isEqual($firstObject, $secondObject);
     * \---
     */
    private function __construct()
    {
    }

    // @codeCoverageIgnoreEnd

    /**
     * Indicates whether the two specified objects are "equal".
     *
     * @param EqualityInterface|null $first  The first reference object with
     *                                       which to compare.
     * @param EqualityInterface|null $second The second reference object with
     *                                       which to compare.
     *
     * @return boolean `true` if the two specified objects are the same; `false`
     *                 otherwise.
     */
    public static function isEqual(
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        $result = false;

        if (null === $first) {
            $result = (null === $second) ? true : false;
        } else {
            $result = $first->equals($second);
        }

        return $result;
    }
}

/**
 * Indicates whether the two specified objects are "equal".
 *
 * @param EqualityInterface|null $first  The first reference object with
 *                                       which to compare.
 * @param EqualityInterface|null $second The second reference object with
 *                                       which to compare.
 *
 * @return boolean `true` if the two specified objects are the same; `false`
 *                 otherwise.
 * @todo Remove since global functions are strongly discouraged.
 */
function is_equal(
    EqualityInterface $first = null,
    EqualityInterface $second = null
) {
    return $first->equals($second);
}
