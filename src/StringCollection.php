<?php

namespace Aziule\TypedCollections;

class StringCollection extends PrimitiveTypedCollection
{
    /**
     * @inheritdoc
     */
    protected function getType()
    {
        return 'string';
    }
}
