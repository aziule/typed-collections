<?php

namespace Aziule\TypedCollections;

class BooleanCollection extends PrimitiveTypedCollection
{
    /**
     * @inheritdoc
     */
    protected function getType()
    {
        return 'boolean';
    }
}
