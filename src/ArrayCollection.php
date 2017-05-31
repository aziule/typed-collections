<?php

namespace Aziule\TypedCollections;

class ArrayCollection extends PrimitiveTypedCollection
{
    public function __construct()
    {
        $this->type = 'array';
    }
}
