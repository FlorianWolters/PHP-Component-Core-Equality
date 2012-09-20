<?php
use FlorianWolters\Component\Core\EqualityInterface;
use FlorianWolters\Component\Core\EqualityTrait;

/**
 * Demonstrates the customization of the equivalence relation on non-`null`
 * object references implemented with the trait {@link EqualityTrait}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
class EqualityCustomImpl implements EqualityInterface
{
    /**
     * Imports the class method {@link EqualityTrait::isEqual} and the member
     * method {@link EqualityTrait::equals}.
     */
    use EqualityTrait;

    /**
     * The value of this object.
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructs a new object with the specified value.
     *
     * @param mixed $value The value.
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Implements the algorithm that indicates whether some other object is
     * "equal to" this object.
     *
     * This method overwrites the identity operator (`===`) used in {@link
     * EqualityTrait::doEqualityComparison} with the equality operator (`==`).
     *
     * @param EqualityInterface $other The reference object with which to
     *                                 compare.
     *
     * @return boolean `true` if this object is the same as the specified
     *                 object; `false` otherwise.
     */
    protected function doEqualityComparison(EqualityInterface $other = null)
    {
        return $this == $other;
    }

//    /**
//     * @todo The method is declared as `final` in {@link EqualityTrait}. Is this
//     *       a bug? (http://bugs.php.net/bug.php?id=62204)
//     */
//    final public static function isEqual(
//        EqualityInterface $first = null,
//        EqualityInterface $second = null
//    ) {
//        throw new \Exception;
//    }
}
