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
 * The static class {@see EqualityUtils} offers operations for equivalence
 * relations on non-`null` object references.
 *
 * @since Class available since Release 0.1.0
 */
final class EqualityUtils
{
    // @codeCoverageIgnoreStart

    /**
     * {@see EqualityUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     * /---code php
     * EqualityUtils::isEqual($firstObject, $secondObject);
     * \---
     */
    protected function __construct()
    {
    }

    // @codeCoverageIgnoreEnd

    /**
     * Indicates whether the two specified objects are "equal".
     *
     * @param EqualityInterface|null $first  The first reference object with
     *    which to compare.
     * @param EqualityInterface|null $second The second reference object with
     *    which to compare.
     *
     * @return bool `true` if the two specified objects are the same; `false`
     *    otherwise.
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

    /**
     * Indicates whether the two specified objects are not "equal".
     *
     * @param EqualityInterface|null $first  The first reference object with
     *    which to compare.
     * @param EqualityInterface|null $second The second reference object with
     *    which to compare.
     *
     * @return bool `true` if the two specified objects are not the same;
     *    `false` otherwise.
     */
    public static function isNotEqual(
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        return false === self::isEqual($first, $second);
    }
}
