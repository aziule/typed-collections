<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidItemTypeException;

abstract class PrimitiveTypedCollection extends TypedCollection
{
    /** @var string */
    protected $type;

    /**
     * @inheritdoc
     */
    public function checkItem($item)
    {
        if (gettype($item) !== $this->type) {
            throw new InvalidItemTypeException(sprintf('Item must be of type %s (%s given)', $this->type, gettype($item)));
        }
    }
}
