<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\EqualityInterface;

/**
 * The class {@see CustomEqualityImpl} can be used to demonstrate implementing a
 * custom equivalence relations on non-`null` object references.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2012-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.2.0
 */
class CustomEqualityImpl implements EqualityInterface
{
    /**
     * The *Identity Field* value.
     *
     * @var integer
     */
    private $id;

    /**
     * The version.
     *
     * @var integer
     */
    private $version;

    /**
     * Constructs a new object.
     *
     * @param integer $id      The *Identity Field* value.
     * @param integer $version The version.
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
