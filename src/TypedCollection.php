<?php

namespace Aziule\TypedCollections;

use Aziule\TypedCollections\Exception\InvalidItemTypeException;

abstract class TypedCollection implements TypedCollectionInterface
{
    /** @var array */
    private $items;

    /**
     * Used by the methods from the \Iterator interface
     *
     * @var int
     */
    private $position = 0;

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
    protected function setItems(array $items)
    {
        foreach ($items as $item) {
            $this->checkItem($item);
        }

        $this->items = $items;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->items[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->items);
    }
}
