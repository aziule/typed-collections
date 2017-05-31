<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\Exception\ClassNotFoundException;
use Aziule\TypedCollections\Exception\InvalidItemTypeException;
use Aziule\TypedCollections\ObjectCollection;

class ObjectCollectionTest extends AbstractCollectionTest
{
    public function test_create_empty_object()
    {
        $collection = new ObjectCollection(\stdClass::class);
        $this->assertCount(0, $collection);

        $this->expectException(ClassNotFoundException::class);
        new ObjectCollection('Unexisting class');
    }

    public function test_create_correct_object()
    {
        $initialData = [
            $this->createObject('John'),
            $this->createObject('Jack'),
            $this->createObject('Jill'),
        ];

        $collection = new ObjectCollection(\stdClass::class, $initialData);
        $this->assertCount(count($initialData), $collection);
        $this->assertCollectionEqualsData($initialData, $collection);
    }

    public function test_create_incorrect_object()
    {
        $initialData = [
            $this->createObject('John'),
            $this->createObject('Jack'),
            $this->createObject('Jill'),
            'Gerard',
        ];

        $this->expectException(InvalidItemTypeException::class);
        new ObjectCollection(\stdClass::class, $initialData);
    }

    public function test_get_class()
    {
        $collection = new ObjectCollection(\stdClass::class);
        $this->assertEquals('stdClass', $collection->getClass());
    }

    /**
     * @param mixed $value
     * @return \stdClass
     */
    private function createObject($value) {
        $object = new \stdClass();
        $object->property = $value;

        return $object;
    }
}
