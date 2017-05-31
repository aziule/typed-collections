<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\IntCollection;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class IntCollectionTest extends AbstractCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new IntCollection();
        $this->assertCount(0, $collection);
    }

    public function test_create_correct_object()
    {
        $initialData = [1, 2, 3];

        $collection = new IntCollection($initialData);
        $this->assertCount(count($initialData), $collection);
        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = [1, 2, 3, 'nope'];

        $this->expectException(InvalidItemTypeException::class);
        new IntCollection($initialData);
    }
}
