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
 */
interface EqualityInterface
{
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
