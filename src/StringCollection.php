<?php

namespace Aziule\TypedCollections;

class StringCollection extends PrimitiveTypedCollection
{
    public function __construct()
    {
        $this->type = 'string';
    }
}
