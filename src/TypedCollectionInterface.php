<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidItemTypeException;

interface TypedCollectionInterface
{
    /**
     * @param mixed $item
     * @return bool
     * @throws InvalidItemTypeException
     */
    public function checkItem($item);
}
