<?php

namespace Aziule\TypedCollections;

class BooleanCollection extends PrimitiveTypedCollection
{
    public function __construct()
    {
        $this->type = 'double';
    }
}
