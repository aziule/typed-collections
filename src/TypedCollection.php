<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidClassException;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

abstract class TypedCollection implements TypedCollectionInterface, \ArrayAccess
{
    /** @var array */
    private $items;

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws InvalidItemTypeException
     */
    public function offsetSet($offset, $value)
    {
        $this->checkItem($value);
        
        if ($offset === null) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * @param array $items
     * @throws InvalidItemTypeException
     * @return $this
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            $this->checkItem($item);
        }

        $this->items = $items;

        return $this;
    }
}
