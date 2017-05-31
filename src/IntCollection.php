<?php

namespace Aziule\TypedCollections;

class IntCollection extends PrimitiveTypedCollection
{
    public function __construct()
    {
        $this->type = 'integer';
    }
}
