<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\ArrayCollection;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;

class ArrayCollectionTest extends AbstractCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new ArrayCollection();
        $this->assertCount(0, $collection);
    }

    public function test_create_correct_object()
    {
        $initialData = [
            [
                'A' => 'B',
                'C',
            ],
            [
                'D' => [
                    'E' => 'F',
                ],
            ],
        ];

        $collection = new ArrayCollection($initialData);
        $this->assertCount(count($initialData), $collection);
        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = [
            [
                'A' => 'B',
                'C',
            ],
            [
                'D' => [
                    'E' => 'F',
                ],
            ],
            9000
        ];

        $this->expectException(InvalidItemTypeException::class);
        new ArrayCollection($initialData);
    }
}
