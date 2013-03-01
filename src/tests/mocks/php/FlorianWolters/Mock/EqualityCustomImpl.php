<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\EqualityInterface;

/**
 * Demonstrates the usage of a custom equivalence relation implementation by
 * implementing the method {@see EqualityInterface::equals}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.1
 */
class EqualityCustomImpl implements EqualityInterface
{
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
     * {@inheritdoc}
     */
    public function equals(EqualityInterface $other = null)
    {
        return $this == $other;
    }
}
