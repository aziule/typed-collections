<?php

namespace Aziule\TypedCollections;

class DoubleCollection extends PrimitiveTypedCollection
{
    /**
     * @inheritdoc
     */
    protected function getType()
    {
        return 'double';
    }
}
