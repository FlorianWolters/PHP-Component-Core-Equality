<?php
namespace FlorianWolters\Component\Core;

/**
 * The trait {@link EqualityTrait} implements an equivalence relation on
 * non-`null` object references.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Trait available since Release 0.1.0
 */
trait EqualityTrait
{
    /**
     * Indicates whether the specified object is "equal to" this object.
     *
     * The {@link equals} method implements an equivalence relation on
     * non-`null` object references:
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
     * The {@link equals} method of trait {@link EqualityTrait} implements the
     * most discriminating possible equivalence relation on objects; that is,
     * for any non-`null` reference values `$x` and `$y`, this method returns
     * `true` if and only if `$x` and `$y` refer to the same object
     * (`$x === `$y` has the value `true`).
     *
     * The {@link equals} method implements the *Equality Method* implementation
     * pattern.
     *
     * @param EqualityInterface|null  $other The reference object with which to
     *                                       compare.
     *
     * @return boolean `true` if this object is the same as the specified
     *                 object; `false` otherwise.
     */
    public function equals(EqualityInterface $other = null)
    {
        return $this === $other;
    }
}
