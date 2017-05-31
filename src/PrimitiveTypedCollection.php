<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidItemTypeException;

abstract class PrimitiveTypedCollection extends TypedCollection
{
    /**
     * @param array $items
     * @throws InvalidItemTypeException
     */
    public function __construct(array $items = [])
    {
        if (count($items) === 0 ) {
            return;
        }

        $this->setItems($items);
    }

    /**
     * @inheritdoc
     */
    public function checkItem($item)
    {
        if (gettype($item) !== $this->getType()) {
            throw new InvalidItemTypeException(sprintf('Item must be of type %s (%s given)', $this->type, gettype($item)));
        }
    }

    /**
     * @return string
     */
    abstract protected function getType();
}
