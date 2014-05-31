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
 * The interface {@see EqualityInterface} indicates that an implementing class
 * implements an equivalence relation on non-`null` object references.
 *
 * @since Interface available since Release 0.1.0
 */
interface EqualityInterface
{
    /**
     * Indicates whether the specified object is "equal to" this object.
     *
     * The {@see equals} method implements an equivalence relation on non-`null`
     * object references:
     *
     * * It is *reflexive*: for any non-`null` reference value `$x`,
     *   `$x->equals($x)` should return `true`.
     * * It is *symmetric*: for any non-`null` reference values `$x` and `$y`,
     *   `$x->equals($y)` should return `true` if and only if `$y->equals($x)`
     *   returns `true`.
     * * It is *transitive*: for any non-`null` reference values `$x`, `$y`, and
     *   `$z`, if `$x->equals($y)` returns `true` and `$y->equals($z)` returns
     *   `true`, then `$x->equals($z)` should return `true`.
     * * It is *consistent*: for any non-`null` reference values `$x` and `$y`,
     *   multiple invocations of `$x->equals($y)` consistently return `true` or
     *   consistently return `false`, provided no information used in {@link
     *   equals} comparisons on the objects is modified.
     * * For any non-`null` reference value `$x`, `$x->equals(null)` should
     *   return `false`.
     *
     * The {@see equals} method implements the *Equality Method* implementation
     * pattern.
     *
     * @param EqualityInterface|null $other The reference object with which to
     *    compare.
     *
     * @return bool `true` if this object is the same as the specified object;
     *    `false` otherwise.
     */
    public function equals(self $other = null);
}
