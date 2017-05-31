<?php

namespace Aziule\TypedCollections;

class IntCollection extends PrimitiveTypedCollection
{
    /**
     * @inheritdoc
     */
    protected function getType()
    {
        return 'integer';
    }
}
