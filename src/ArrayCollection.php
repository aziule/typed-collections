<?php

namespace Aziule\TypedCollections;

class ArrayCollection extends PrimitiveTypedCollection
{
    /**
     * @inheritdoc
     */
    protected function getType()
    {
        return 'array';
    }
}
