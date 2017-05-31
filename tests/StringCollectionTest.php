<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\StringCollection;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class StringCollectionTest extends BaseCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new StringCollection([]);
        $this->assertCount(0, $collection);
    }

    public function test_create_correct_object()
    {
        $initialData = ['I', 'am', 'a', 'string'];

        $collection = new StringCollection($initialData);
        $this->assertCount(count($initialData), $collection);

        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = ['I', 'am', 'a', 1337, 'string'];

        $this->expectException(InvalidItemTypeException::class);
        new StringCollection($initialData);
    }
}
