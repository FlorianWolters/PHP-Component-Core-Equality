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
 * @todo      The current behaviour is equal to the Java programming language?
 *            Change it as follows?
 *            * Only allow comparison of instances from the same class?
 *            * Disallow `null` references?
 */
trait EqualityTrait
{
    /**
     * Indicates whether the two specified objects are "equal".
     *
     * The {@link isEqual} method implements an equivalence relation on
     * non-`null` object references:
     *
     * * It is *reflexive*: for any non-`null` reference value `$x`,
     *   `EqualityImpl::isEqual($x, $x)` should return `true`.
     * * It is *symmetric*: for any non-`null` reference values `$x` and `$y`,
     *   `EqualityImpl::isEqual($x, $y)` should return `true` if and only if
     *   `EqualityImpl::isEqual($y, $x)` returns `true`.
     * * It is *transitive*: for any non-`null` reference values `$x`, `$y`, and
     *   `$z`, if `EqualityImpl::isEqual($x, $y)` returns `true` and
     *   `EqualityImpl::isEqual($y, $z)` returns `true`, then
     *   `EqualityImpl::isEqual($x, $z)` should return `true`.
     * * It is *consistent*: for any non-`null` reference values `$x` and `$y`,
     *   multiple invocations of `EqualityImpl::equals($x, $y)` consistently
     *   return `true` or consistently return `false`, provided no information
     *   used in {@link isEqual} comparisons on the objects is modified.
     * * For any non-`null` reference value `$x`,
     *   `EqualityImpl::isEqual($x, null)` should return `false`.
     *
     * The {@link isEqual} method of trait {@link EqualityTrait} implements the
     * most discriminating possible equivalence relation on objects; that is,
     * for any non-`null` reference values `$x` and `$y`, this method returns
     * `true` if and only if `$x` and `$y` refer to the same object
     * (`$x === `$y` has the value `true`).
     *
     * The {@link isEqual} method implements the *Equality Method*
     * implementation pattern.
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
    final public static function isEqual(
        EqualityInterface $first = null,
        EqualityInterface $second = null
    ) {
        return EqualityUtils::isEqual($first, $second);
    }

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
    final public function equals(EqualityInterface $other = null)
    {
//        $this->isInstanceOf($other);

        return $this->doEqualityComparison($other);
    }

//    /**
//     * Checks whether the specified object is an instance of the class using
//     * this trait.
//     *
//     * @param EqualityInterface|null $other The object to check.
//     *
//     * @return void
//     * @throws \RuntimeException If the specified object is not an instance of
//     *                           the class using this trait.
//     */
//    private function isInstanceOf(EqualityInterface $other = null)
//    {
//        if (false === ($other instanceof self)) {
//            $this->throwRuntimeException();
//        }
//    }

//    /**
//     * Throws a RuntimeException.
//     *
//     * @return void
//     * @throws \RuntimeException Always.
//     */
//    private function throwRuntimeException()
//    {
//        throw new \RuntimeException(
//            'Argument 1 passed to ' . __CLASS__ . '::equals'
//            . ' must be an instance of ' . __CLASS__ . '.'
//        );
//    }

    /**
     * Implements the algorithm that indicates whether some other object is
     * "equal to" this object.
     *
     * The `doEqualityComparison` can be overwritten to define a custom
     * equivalence relation between two objects.
     *
     * @param EqualityInterface|null $other The reference object with which to
     *                                      compare.
     * @return boolean `true` if this object is the same as the specified
     *                 object; `false` otherwise.
     */
    protected function doEqualityComparison(EqualityInterface $other = null)
    {
        return $this === $other;
    }
}
