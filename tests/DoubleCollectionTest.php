<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\DoubleCollection;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class DoubleCollectionTest extends AbstractCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new DoubleCollection();
        $this->assertCount(0, $collection);
    }

    public function test_create_correct_object()
    {
        $initialData = [
            1.234,
            1.2e3,
            7E-10
        ];

        $collection = new DoubleCollection($initialData);
        $this->assertCount(count($initialData), $collection);
        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = [
            1.234,
            1.2e3,
            7E-10,
            false
        ];

        $this->expectException(InvalidItemTypeException::class);
        new DoubleCollection($initialData);
    }
}
