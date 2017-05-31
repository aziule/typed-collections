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
     * @param array $items
     * @throws ClassNotFoundException
     * @throws InvalidItemTypeException
     */
    public function __construct($class, array $items = [])
    {
        if (!class_exists($class)) {
            throw new ClassNotFoundException(sprintf('Class "%s" does not exist', $class));
        }

        $this->class = $class;

        if (count($items) > 0) {
            $this->setItems($items);
        }
    }

    /**
     * @inheritdoc
     */
    public function checkItem($item)
    {
        if (!$item instanceof $this->class) {
            $itemType = gettype($item);

            throw new InvalidItemTypeException(
                sprintf(
                    'Item must be of type "%s" ("%s" given)',
                    $this->class, $itemType === 'object' ? get_class($item) : $itemType
                )
            );
        }
    }
}
