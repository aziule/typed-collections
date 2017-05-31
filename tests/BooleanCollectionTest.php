<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\BooleanCollection;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class BooleanCollectionTest extends BaseCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new BooleanCollection([]);
        $this->assertCount(0, $collection);
    }

    public function test_create_correct_object()
    {
        $initialData = [true, false, true];

        $collection = new BooleanCollection($initialData);
        $this->assertCount(count($initialData), $collection);

        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = [true, false, true, 42];

        $this->expectException(InvalidItemTypeException::class);
        new BooleanCollection($initialData);
    }
}
