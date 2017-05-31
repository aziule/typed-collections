<?php

namespace Aziule\Test\TypedCollection;

use Aziule\TypedCollections\TypedCollectionInterface;

abstract class AbstractCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $expected
     * @param TypedCollectionInterface $actual
     */
    protected function assertCollectionEqualsData(array $expected, TypedCollectionInterface $actual) {
        for ($i = 0, $nbItems = count($expected); $i < $nbItems; $i++) {
            $this->assertEquals($expected[$i], $actual[$i]);
        }
    }
}
