<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\ClassNotFoundException;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class ObjectCollection extends TypedCollection
{
    /** @var string */
    private $class;

    /**
     * @param string $class
     * @throws ClassNotFoundException
     */
    public function __construct($class)
    {
        if (!class_exists($class)) {
            throw new ClassNotFoundException(sprintf('Class "%s" does not exist', $class));
        }

        $this->class = $class;
    }

    /**
     * @inheritdoc
     */
    public function checkItem($item)
    {
        if (!$item instanceof $this->class) {
            throw new InvalidItemTypeException(sprintf('Item must be of type "%s" ("%s" given)', $this->class, get_class($item)));
        }
    }
}
