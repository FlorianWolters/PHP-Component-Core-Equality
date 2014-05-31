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

namespace FlorianWolters\Example;

use FlorianWolters\Component\Core\EqualityInterface;

/**
 * The class {@see CustomEqualityImpl} can be used to demonstrate implementing a
 * custom equivalence relations on non-`null` object references.
 *
 * @since Class available since Release 0.2.0
 */
final class CustomEqualityImpl implements EqualityInterface
{
    /**
     * The *Identity Field* value.
     *
     * @var int
     */
    private $id;

    /**
     * The version.
     *
     * @var int
     */
    private $version;

    /**
     * Constructs a new object.
     *
     * @param int $id      The *Identity Field* value.
     * @param int $version The version.
     */
    public function __construct($id, $version)
    {
        $this->id = $id;
        $this->version = $version;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(EqualityInterface $other = null)
    {
        // Check the type of the argument with the type operator "instanceof".
        return (true === ($other instanceof self))
            ? ($this->id === $other->id)
            : false;
    }
}
