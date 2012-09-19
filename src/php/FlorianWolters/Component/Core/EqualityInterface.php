<?php
namespace FlorianWolters\Component\Core;

/**
 * The interface {@link EqualityInterface} indicates that an implementing class
 * implements an equivalence relation on non-`null` object references.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Interface available since Release 0.1.0
 * @todo      Remove static method {@link isEqual}? Use class {@link
 *            EqualityUtils} instead?
 */
interface EqualityInterface
{
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
     * @todo Remove since using the static class method {@link
     *       EqualityUtils::isEqual} is better.
     */
    public static function isEqual(self $first = null, self $second = null);

    /**
     * Indicates whether the specified object is "equal to" this object.
     *
     * @param EqualityInterface|null $other The reference object with which to
     *                                      compare.
     *
     * @return boolean `true` if this object is the same as the specified
     *                 object; `false` otherwise.
     */
    public function equals(self $other = null);
}
