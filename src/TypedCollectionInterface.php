<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidItemTypeException;

interface TypedCollectionInterface extends \ArrayAccess, \Iterator, \Countable
{
    /**
     * @param mixed $item
     * @return bool
     * @throws InvalidItemTypeException
     */
    public function checkItem($item);
}
